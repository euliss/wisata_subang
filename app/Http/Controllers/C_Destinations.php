<?php

namespace App\Http\Controllers;

use App\Exports\DestinationExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use DB;

class C_Destinations extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dataModalDestinasi = DB::table('destinations')
            ->selectRaw("destinations.*, categories.categories_name")
            ->join('categories', 'categories.id_categories', '=', 'destinations.id_category')
            ->join('user_destinations', 'user_destinations.id_destination', '=', 'destinations.id')
            ->where('user_destinations.id_user', '=', auth()->user()->id) // Menggunakan binding parameter untuk keamanan
            ->get();

        $data = [
            'sidebarTitle' => 'Destinations',
            'dataModalDestinasi' => $dataModalDestinasi,
            'destinations' => DB::table('destinations')
                ->selectRaw("destinations.*, categories.categories_name")
                ->join('categories', 'categories.id_categories', '=', 'destinations.id_category')
                ->join('user_destinations', 'user_destinations.id_destination', '=', 'destinations.id')
                ->whereRaw('user_destinations.id_user = ' . auth()->user()->id)
                ->get(),
            'destination_all' => DB::table('destinations')
                ->selectRaw("destinations.*, categories.categories_name")
                ->join('categories', 'categories.id_categories', '=', 'destinations.id_category')
                ->orderByDesc('destinations.id') // Menggunakan orderByDesc dengan kolom yang tepat untuk mengurutkan
                ->get()
        ];
        return view('creator/destinations/v_index', $data);
    }

    public function detail($id)
    {
        $dataModalDestinasi = DB::table('destinations')->selectRaw("destinations.*, categories.categories_name")
            // ->select('destinations.*')
            ->join('categories', 'categories.id_categories', '=', 'destinations.id_category')
            ->join('user_destinations', 'user_destinations.id_destination', '=', 'destinations.id')
            ->whereRaw('user_destinations.id_user = ' . auth()->user()->id)
            ->get();

        $data = [
            'sidebarTitle' => 'Destinations',
            'dataModalDestinasi' => $dataModalDestinasi,
            'destinations' => DB::table('destinations')->where('id', $id)->first(),
            'categories' => DB::table('categories')->get()
        ];

        return view('creator/destinations/v_detail', $data);
    }

    public function add()
    {
        $dataModalDestinasi = DB::table('destinations')->selectRaw("destinations.*, categories.categories_name")
            // ->select('destinations.*')
            ->join('categories', 'categories.id_categories', '=', 'destinations.id_category')
            ->join('user_destinations', 'user_destinations.id_destination', '=', 'destinations.id')
            ->whereRaw('user_destinations.id_user = ' . auth()->user()->id)
            ->get();

        $data = [
            'sidebarTitle' => 'Destinations',
            'dataModalDestinasi' => $dataModalDestinasi,
            'categories' => DB::table('categories')->where('status', 'Aktif')->get()
        ];
        return view('creator/destinations/v_add', $data);
    }

    public function insert(Request $request)
    {
        Request()->validate([
            'image[]'             => 'mimes:jpg,jpeg,png,bmp|max:5024',
        ], [
            'image[].mimes'       => 'Image is jpg, jpeg, png !',
        ]);

        $files = $request->file('image');
        $filename = "";
        foreach ($files as $file) {
            $file->move('images/destinations', $file->getClientOriginalName());
            $filename .= "|" . $file->getClientOriginalName();
        }

        $id_destination = DB::table('destinations')->insertGetId([
            'id_category' => $request->id_category,
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'alamat' => $request->alamat,
            'contact' => $request->contact,
            'jam_operasional' => $request->jam_operasional,
            'harga' => $request->harga,
            'fasilitas' => $request->fasilitas,
            'menu' => $request->menu,
            'tipe_kamar' => $request->tipe_kamar,
            'status' => '0',
            'image' => $filename,
        ]);

        DB::table('user_destinations')->insert([
            'id_user' => auth()->user()->id,
            'id_destination' => $id_destination,
        ]);
        return redirect()->route('destinations')->with('pesan', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $dataModalDestinasi = DB::table('destinations')->selectRaw("destinations.*, categories.categories_name")
            // ->select('destinations.*')
            ->join('categories', 'categories.id_categories', '=', 'destinations.id_category')
            ->join('user_destinations', 'user_destinations.id_destination', '=', 'destinations.id')
            ->whereRaw('user_destinations.id_user = ' . auth()->user()->id)
            ->get();

        $data = [
            'sidebarTitle' => 'Destinations',
            'dataModalDestinasi' => $dataModalDestinasi,
            'destinations' => DB::table('destinations')->where('id', $id)->first(),
            'categories' => DB::table('categories')->where('status', 'Aktif')->get()
        ];

        return view('creator/destinations/v_edit', $data);
    }

    public function update($id, Request $request)
    {
        Request()->validate([
            'image[]'             => 'mimes:jpg,jpeg,png,bmp|max:5024',
        ], [
            'image[].mimes'       => 'Image is jpg, jpeg, png !',
        ]);

        // $data = [];
        // $files = $request->file('image');
        // $filename = "";

        // if ($files != null) {
        //     foreach ($files as $file) {
        //         $file->move('images/destinations', $file->getClientOriginalName());
        //         $filename .= "|" . $file->getClientOriginalName();
        //     }
        //     $data['image'] = $filename;
        // }
        $files = $request->file('image');
        $filename = "";
        foreach ($files as $file) {
            $file->move('images/destinations', $file->getClientOriginalName());
            $filename .= "|" . $file->getClientOriginalName();
        }

        $data = [
            'id_category' => $request->id_category,
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'alamat' => $request->alamat,
            'contact' => $request->contact,
            'jam_operasional' => $request->jam_operasional,
            'harga' => $request->harga,
            'fasilitas' => $request->fasilitas,
            'menu' => $request->menu,
            'tipe_kamar' => $request->tipe_kamar,
            'status' => '0',
            'image' => $filename,
        ];

        DB::table('destinations')->where('id', $id)->update($data);
        return redirect()->route('destinations')->with('pesan', 'Data Updated Successfully !');
    }

    public function change_status($id, $status)
    {
        DB::table('destinations')->where('id', $id)->update([
            'status' => $status,
        ]);
        return redirect()->route('destinations')->with('pesan', 'Data Updated Successfully !');
    }

    public function delete($id)
    {
        DB::table('reports')->where('id_destination', $id)->delete();
        DB::table('comments')->where('id_destination', $id)->delete();
        DB::table('user_destinations')->where('id_destination', $id)->delete();
        DB::table('destinations')->where('id', $id)->delete();
        return redirect()->route('destinations')->with('pesan', 'Data Deleted Successfully !');
    }

    public function comments($id_destination)
    {
        $dataModalDestinasi = DB::table('destinations')->selectRaw("destinations.*, categories.categories_name")
            // ->select('destinations.*')
            ->join('categories', 'categories.id_categories', '=', 'destinations.id_category')
            ->join('user_destinations', 'user_destinations.id_destination', '=', 'destinations.id')
            ->whereRaw('user_destinations.id_user = ' . auth()->user()->id)
            ->get();

        $data = [
            'sidebarTitle' => 'Comments Destination',
            'dataModalDestinasi' => $dataModalDestinasi,
            'comments' => DB::table('comments')->where('id_destination', $id_destination)
                ->orderByDesc('destinations.id') // Menggunakan orderByDesc dengan kolom yang tepat untuk mengurutkan
                ->get(),
            'destination' => DB::table('destinations')->where('id', $id_destination)
                ->first(),
        ];

        return view('creator/comments/v_index', $data);
    }

    public function comments_add()
    {
        $dataModalDestinasi = DB::table('destinations')->selectRaw("destinations.*, categories.categories_name")
            // ->select('destinations.*')
            ->join('categories', 'categories.id_categories', '=', 'destinations.id_category')
            ->join('user_destinations', 'user_destinations.id_destination', '=', 'destinations.id')
            ->whereRaw('user_destinations.id_user = ' . auth()->user()->id)
            ->get();

        $data = [
            'sidebarTitle' => 'Destinations',
            'dataModalDestinasi' => $dataModalDestinasi,
        ];
        return view('creator/comments/v_add', $data);
    }

    public function comments_insert($id_destination, Request $request)
    {
        DB::table('comments')->insert([
            'id_destination' => $id_destination,
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content,
            'rating' => $request->rating,
        ]);
        return redirect('comments-destination/' . $id_destination)->with('pesan', 'Data Saved Successfully !');
    }

    public function comments_edit($id)
    {
        $dataModalDestinasi = DB::table('destinations')->selectRaw("destinations.*, categories.categories_name")
            // ->select('destinations.*')
            ->join('categories', 'categories.id_categories', '=', 'destinations.id_category')
            ->join('user_destinations', 'user_destinations.id_destination', '=', 'destinations.id')
            ->whereRaw('user_destinations.id_user = ' . auth()->user()->id)
            ->get();

        $data = [
            'sidebarTitle' => 'Destinations',
            'dataModalDestinasi' => $dataModalDestinasi,
            'comment' => DB::table('comments')->where('id', $id)->first(),
        ];

        return view('creator/comments/v_edit', $data);
    }

    public function comments_update($id, Request $request)
    {
        $id_destination = DB::table('comments')->where('id', $id)->first()->id_destination;
        DB::table('comments')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content,
            'rating' => $request->rating,
        ]);
        return redirect('comments-destination/' . $id_destination)->with('pesan', 'Data Updated Successfully !');
    }

    public function comments_delete($id)
    {
        $id_destination = DB::table('comments')->where('id', $id)->first()->id_destination;
        DB::table('comments')->where('id', $id)->delete();
        return redirect('comments-destination/' . $id_destination)->with('pesan', 'Data Deleted Successfully !');
    }

    public function reports($id_destination)
    {
        $data_reports = DB::table('reports')->where('id_destination', $id_destination)->get();
        if (isset($_GET['dari_tanggal'])) $data_reports = DB::table('reports')->where('id_destination', $id_destination)->whereBetween('date', [$_GET['dari_tanggal'], $_GET['sampai_tanggal']])->get();

        $dataModalDestinasi = DB::table('destinations')->selectRaw("destinations.*, categories.categories_name")
            // ->select('destinations.*')
            ->join('categories', 'categories.id_categories', '=', 'destinations.id_category')
            ->join('user_destinations', 'user_destinations.id_destination', '=', 'destinations.id')
            ->whereRaw('user_destinations.id_user = ' . auth()->user()->id)
            ->get();

        $data = [
            'sidebarTitle' => 'Reports Destination',
            'reports' => $data_reports,
            'dataModalDestinasi' => $dataModalDestinasi,
            'destination' => DB::table('destinations')->where('id', $id_destination)->first(),
        ];

        return view('creator/reports/v_index', $data);
    }

    public function reports_add()
    {
        $dataModalDestinasi = DB::table('destinations')->selectRaw("destinations.*, categories.categories_name")
            // ->select('destinations.*')
            ->join('categories', 'categories.id_categories', '=', 'destinations.id_category')
            ->join('user_destinations', 'user_destinations.id_destination', '=', 'destinations.id')
            ->whereRaw('user_destinations.id_user = ' . auth()->user()->id)
            ->get();

        $data = [
            'sidebarTitle' => 'Reports',
            'dataModalDestinasi' => $dataModalDestinasi
        ];
        return view('creator/reports/v_add', $data);
    }

    public function reports_insert($id_destination, Request $request)
    {

        $destinations = DB::table('destinations')->where('id', $id_destination)->first();

        DB::table('destinations')->where('id', $id_destination)->update([
            'jumlah_pengunjung' => $destinations->jumlah_pengunjung + $request->count,
        ]);

        DB::table('reports')->insert([
            'id_destination' => $id_destination,
            'count' => $request->count,
            'content' => $request->content,
            'date' => $request->date,
        ]);
        return redirect('reports-destination/' . $id_destination)->with('pesan', 'Data Saved Successfully !');
    }

    public function reports_edit($id)
    {
        $dataModalDestinasi = DB::table('destinations')->selectRaw("destinations.*, categories.categories_name")
            // ->select('destinations.*')
            ->join('categories', 'categories.id_categories', '=', 'destinations.id_category')
            ->join('user_destinations', 'user_destinations.id_destination', '=', 'destinations.id')
            ->whereRaw('user_destinations.id_user = ' . auth()->user()->id)
            ->get();

        $data = [
            'sidebarTitle' => 'Reports',
            'dataModalDestinasi' => $dataModalDestinasi,
            'report' => DB::table('reports')->where('id', $id)->first(),
        ];

        return view('creator/reports/v_edit', $data);
    }

    public function reports_update($id, Request $request)
    {

        $id_destination = DB::table('reports')->where('id', $id)->first()->id_destination;

        $report = DB::table('reports')->where('id', $id)->first();
        $destinations = DB::table('destinations')->where('id', $id_destination)->first();

        DB::table('destinations')->where('id', $id_destination)->update([
            'jumlah_pengunjung' => $destinations->jumlah_pengunjung - $report->count,
        ]);

        DB::table('reports')->where('id', $id)->update([
            'count' => $request->count,
            'content' => $request->content,
            'date' => $request->date,
        ]);

        $destinations = DB::table('destinations')->where('id', $id_destination)->first();
        DB::table('destinations')->where('id', $id_destination)->update([
            'jumlah_pengunjung' => $destinations->jumlah_pengunjung + $request->count,
        ]);

        return redirect('reports-destination/' . $id_destination)->with('pesan', 'Data Updated Successfully !');
    }

    public function reports_delete($id)
    {
        $id_destination = DB::table('reports')->where('id', $id)->first()->id_destination;

        $report = DB::table('reports')->where('id', $id)->first();
        $destinations = DB::table('destinations')->where('id', $id_destination)->first();

        DB::table('destinations')->where('id', $id_destination)->update([
            'jumlah_pengunjung' => $destinations->jumlah_pengunjung - $report->count,
        ]);

        DB::table('reports')->where('id', $id)->delete();
        return redirect('reports-destination/' . $id_destination)->with('pesan', 'Data Deleted Successfully !');
    }

    public function export_excel()
    {
        return Excel::download(new DestinationExport, 'report.xlsx');
    }

    public function modalKomentarDestinasi()
    {
        $id_destination = Request()->id_destinasi;

        $dataModalDestinasi = DB::table('destinations')->selectRaw("destinations.*, categories.categories_name")
            // ->select('destinations.*')
            ->join('categories', 'categories.id_categories', '=', 'destinations.id_category')
            ->join('user_destinations', 'user_destinations.id_destination', '=', 'destinations.id')
            ->whereRaw('user_destinations.id_user = ' . auth()->user()->id)
            ->get();

        $data = [
            'sidebarTitle' => 'Comments Destination',
            'dataModalDestinasi' => $dataModalDestinasi,
            'comments' => DB::table('comments')->where('id_destination', $id_destination)->orderByDesc('id')->get(),
            'destination' => DB::table('destinations')->where('id', $id_destination)->first(),
        ];

        return view('creator/comments/v_index', $data);
    }

    public function modalLaporanDestinasi()
    {
        $id_destination = Request()->id_destinasi;

        $data_reports = DB::table('reports')->where('id_destination', $id_destination)->get();
        if (isset($_GET['dari_tanggal'])) $data_reports = DB::table('reports')->where('id_destination', $id_destination)->whereBetween('date', [$_GET['dari_tanggal'], $_GET['sampai_tanggal']])->get();

        $dataModalDestinasi = DB::table('destinations')->selectRaw("destinations.*, categories.categories_name")
            // ->select('destinations.*')
            ->join('categories', 'categories.id_categories', '=', 'destinations.id_category')
            ->join('user_destinations', 'user_destinations.id_destination', '=', 'destinations.id')
            ->whereRaw('user_destinations.id_user = ' . auth()->user()->id)
            ->get();
        $data = [
            'sidebarTitle' => 'Reports Destination',
            'reports' => DB::table('reports')->where('id_destination', $id_destination)->orderByDesc('id')->get(),
            'dataModalDestinasi' => $dataModalDestinasi,
            'destination' => DB::table('destinations')->where('id', $id_destination)->first(),
        ];

        return view('creator/reports/v_index', $data);
    }
}
