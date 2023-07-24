<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Categories;
use App\Models\M_Users;
use App\Models\M_News;
use App\Models\User;
use App\Models\M_Destinations;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->M_Categories = new M_Categories();
        $this->M_Users = new M_Users();
        $this->M_Destinations = new M_Destinations();
    }

    public function index()
    {

        $data_graphic = DB::table('reports')
            ->select(
                'reports.*',
                DB::raw('sum(reports.count) as `report_count`'),
                DB::raw("DATE_FORMAT(reports.date, '%m-%Y') month_year"),
                DB::raw('YEAR(reports.date) year, MONTH(reports.date) month')
            )
            ->leftJoin('destinations', 'destinations.id', '=', 'reports.id_destination')->groupby('year', 'month')->get();

        // $report = DB::table('reports')
        //     ->select('id_destination', 'name')
        //     ->join('destinations', 'destinations.id', '=', 'reports.id_destination')
        //     ->distinct('id_destination')
        //     ->orderBy('count', 'DESC')->get();

        // foreach ($report as $item) {
        //     $jumlahPengunjungDestination[] = $this->M_Destinations->jumlahByDestination($item->id_destination);
        // }

        $destinasi = DB::table('destinations')
            ->select('name', 'jumlah_pengunjung')
            ->where('jumlah_pengunjung', '>', 0)
            ->orderBy('jumlah_pengunjung', 'DESC')->limit(8)->get();


        // $data_report = DB::table('reports')
        //     ->join('destinations', 'destinations.id', '=', 'reports.id_destination')
        //     ->join('categories', 'categories.id_categories', '=', 'destinations.id_category')
        //     ->orderBy('count', 'DESC')->get();


        $category = DB::table('categories')
            ->orderBy('id_categories', 'ASC')
            ->get();

        foreach ($category as $item) {
            $jumlahPengunjung[] = $this->M_Categories->jumlahByCategory($item->id_categories);
        }

        $dataModalDestinasi = DB::table('destinations')->selectRaw("destinations.*, categories.categories_name")
            // ->select('destinations.*')
            ->join('categories', 'categories.id_categories', '=', 'destinations.id_category')
            ->join('user_destinations', 'user_destinations.id_destination', '=', 'destinations.id')
            ->whereRaw('user_destinations.id_user = ' . auth()->user()->id)
            ->get();

        $data = [
            'sidebarTitle' => 'Dashboard',
            'users' => $this->M_Users->numberOfUsers(),
            'categories' => $this->M_Categories->numberOfCategories(),
            'destinations' => $this->M_Destinations->numberOfDestinations(),
            'graphic' => $data_graphic,
            'destinasi' => $destinasi,
            'category' => $category,
            'jumlahPengunjung' => $jumlahPengunjung,
            'dataModalDestinasi' => $dataModalDestinasi,
        ];

        if (auth()->user()->status == "non-active") {
            auth()->logout();
            return redirect()->to(route('login'));
        }

        return view('v_home', $data);
    }

    public function kirimNotifikasi()
    {

        $data = [
            'sidebarTitle' => 'Kirim Notifikasi',
            'destination' => DB::table('destinations')->where('status', 1)->get()
        ];

        if (auth()->user()->status == "non-active") {
            auth()->logout();
            return redirect()->to(route('login'));
        }

        return view('v_kirimNotifikasi', $data);
    }

    public function prosesKirimNotifikasi()
    {
        foreach (Request()->id_destination as $item) {
            $detail = DB::table('destinations')->where('id', $item)->first();

            $noHp = substr($detail->contact, 1);

            $token = 'c137c5f820a21a0e498b4e2ff09508c9e40e7c1adfa2918c8363686a84746dac';
            $whatsapp_phone = '+62' . $noHp;

            $message = Request()->pesan;

            $url = "https://sendtalk-api.taptalk.io/api/v1/message/send_whatsapp";

            $data = [
                "phone" => $whatsapp_phone,
                "messageType" => "text",
                "body" => $message
            ];

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $headers = array(
                "API-Key: $token",
                "Content-Type: application/json",
            );
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

            //for debug only!
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

            curl_exec($curl);
            curl_close($curl);
        }

        return redirect()->route('home');
    }

    public function changeStatus($status, $id)
    {
        DB::table('users')->where('id', $id)->update([
            'status' => $status
        ]);
        return redirect('users');
    }

    public function registrasi()
    {
        return view('v_register');
    }

    public function verification(Request $request)
    {
        $email = explode('...', $request->token)[1];
        User::where('email', $email)->update(['status' => 'active']);
        return redirect('login')->with('pesan', 'Akun Berhasil Diverifikasi, Silahkan Login');
    }

    public function store_registrasi(Request $request)
    {
        $password = Hash::make($request->password);

        Request()->validate([
            'name'              => 'required',
            'email'             => 'required|unique:users,email',
            'nik'               => 'required|unique:users,nik|max:16',
            'password'          => 'required|confirmed|min:8',
        ], [
            'name.required'     => 'Full Name is required !',
            'email.required'    => 'Email is required !',
            'nik.required'      => 'NIK is required !',
            'nik.max'      => 'Maksimal input Nik is 16 Character !',
            'password.required' => 'Password is required !',
            'password.min' => 'Minimal input password is 8 character !',
            'email.unique'      => 'Email already exist !',
            'nik.unique'        => 'NIK already exist !',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nik' => $request->nik,
            'status' => 'non-active',
            'level' => '2',
            'password' => $password,
        ]);

        try {
            Mail::to($request->email)->send(new VerificationMail($password, $request->email));
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect('login')->with('pesan', 'Berhasil Registrasi, Cek Email Anda Untuk Verifikasi Email');
    }
}
