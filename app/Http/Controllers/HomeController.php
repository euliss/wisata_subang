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
        $this->M_Destinations= new M_Destinations();
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
            ->leftJoin('destinations', 'destinations.id', '=', 'reports.id_destination')->groupby('year','month')->get();
            
        $data = [
            'sidebarTitle' => 'Dashboard',
            'users' => $this->M_Users->numberOfUsers(),
            'categories' => $this->M_Categories->numberOfCategories(),
            'destinations' => $this->M_Destinations->numberOfDestinations(),
            'graphic' => $data_graphic,
        ];

        if (auth()->user()->status == "non-active") {
            auth()->logout();
            return redirect()->to(route('login'));
        }

        return view('v_home', $data);
    }

    public function changeStatus($status,$id){
        DB::table('users')->where('id',$id)->update([
            'status' => $status
        ]);
        return redirect('users');
    }

    public function registrasi(){
        return view('v_register');
    }

    public function verification(Request $request){
        $email = explode('...',$request->token)[1];
        User::where('email',$email)->update(['status'=>'active']);
        return redirect('login')->with('pesan', 'Akun Berhasil Diverifikasi, Silahkan Login');
    }

    public function store_registrasi(Request $request){
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

        try{
            Mail::to($request->email)->send(new VerificationMail($password,$request->email));
        }
        catch(\Exception $e){
            dd($e);
        }
        return redirect('login')->with('pesan', 'Berhasil Registrasi, Cek Email Anda Untuk Verifikasi Email');
    }
}
