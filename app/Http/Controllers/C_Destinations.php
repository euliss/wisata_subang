<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class C_Destinations extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $data = [
            'sidebarTitle' => 'Destinations',
            'destinations' => DB::table('destinations')
                ->join('user_destinations', 'user_destinations.id_destination', '=', 'destinations.id')
                ->whereRaw('user_destinations.id_user = '.auth()->user()->id)
                ->get(),
            'destination_all' => DB::table('destinations')->get()
        ];
        return view('creator/destinations/v_index', $data);
    }

    public function detail($id){
        $data = [
            'sidebarTitle' => 'Destinations',
            'destinations' => DB::table('destinations')->where('id',$id)->first(),
            'categories' => DB::table('categories')->get()
        ];

        return view('creator/destinations/v_detail', $data);
    }

    public function add(){
        $data = [
            'sidebarTitle' => 'Destinations',
            'categories' => DB::table('categories')->get()
        ];
        return view('creator/destinations/v_add', $data);
    }

    public function insert(Request $request){
        $files = $request->file('image');
        $filename = "";
        foreach ($files as $file) {
            $file->move('images/destinations',$file->getClientOriginalName());
            $filename .= "|".$file->getClientOriginalName();
        }

        $id_destination = DB::table('destinations')->insertGetId([
            'id_category' => $request->id_category,
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'contact' => $request->contact,
            'status' => '0',
            'image' => $filename,
        ]);

        DB::table('user_destinations')->insert([
            'id_user' => auth()->user()->id,
            'id_destination' => $id_destination,
        ]);
        return redirect()->route('destinations')->with('pesan', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id){
        $data = [
            'sidebarTitle' => 'Destinations',
            'destinations' => DB::table('destinations')->where('id',$id)->first(),
            'categories' => DB::table('categories')->get()
        ];

        return view('creator/destinations/v_edit', $data);
    }

    public function update($id, Request $request){
        $files = $request->file('image');
        $filename = "";
        foreach ($files as $file) {
            $file->move('images/destinations',$file->getClientOriginalName());
            $filename .= "|".$file->getClientOriginalName();
        }
        DB::table('destinations')->where('id',$id)->update([
            'id_category' => $request->id_category,
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'contact' => $request->contact,
            'status' => '0',
            'image' => $filename,
        ]);
        return redirect()->route('destinations')->with('pesan', 'Data Updated Successfully !');
    }

    public function change_status($id,$status){
        DB::table('destinations')->where('id',$id)->update([
            'status' => $status,
        ]);
        return redirect()->route('destinations')->with('pesan', 'Data Updated Successfully !');
    }

    public function delete($id){
        DB::table('destinations')->where('id',$id)->delete();
        return redirect()->route('destinations')->with('pesan', 'Data Deleted Successfully !');
    }

    public function comments($id_destination){
        $data = [
            'sidebarTitle' => 'Comments Destination',
            'comments' => DB::table('comments')->where('id_destination',$id_destination)->get(),
            'destination' => DB::table('destinations')->where('id',$id_destination)->first(),
        ];

        return view('creator/comments/v_index', $data);
    }

    public function comments_add(){
        $data = [
            'sidebarTitle' => 'Destinations',
        ];
        return view('creator/comments/v_add', $data);
    }

    public function comments_insert($id_destination, Request $request){
        DB::table('comments')->insert([
            'id_destination' => $id_destination,
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content,
            'rating' => $request->rating,
        ]);
        return redirect('comments-destination/'.$id_destination)->with('pesan', 'Data Saved Successfully !');
    }

    public function comments_edit($id){
        $data = [
            'sidebarTitle' => 'Destinations',
            'comment' => DB::table('comments')->where('id',$id)->first(),
        ];

        return view('creator/comments/v_edit', $data);
    }

    public function comments_update($id, Request $request){
        $id_destination = DB::table('comments')->where('id',$id)->first()->id_destination;
        DB::table('comments')->where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content,
            'rating' => $request->rating,
        ]);
        return redirect('comments-destination/'.$id_destination)->with('pesan', 'Data Updated Successfully !');
    }

    public function comments_delete($id){
        $id_destination = DB::table('comments')->where('id',$id)->first()->id_destination;
        DB::table('comments')->where('id',$id)->delete();
        return redirect('comments-destination/'.$id_destination)->with('pesan', 'Data Deleted Successfully !');
    }

    public function reports($id_destination){
        $data_reports = DB::table('reports')->where('id_destination',$id_destination)->get();
        if(isset($_GET['dari_tanggal'])) $data_reports = DB::table('reports')->where('id_destination',$id_destination)->whereBetween('date',[$_GET['dari_tanggal'],$_GET['sampai_tanggal']])->get();
        
        $data = [
            'sidebarTitle' => 'Reports Destination',
            'reports' => $data_reports,
            'destination' => DB::table('destinations')->where('id',$id_destination)->first(),
        ];

        return view('creator/reports/v_index', $data);
    }

    public function reports_add(){
        $data = [
            'sidebarTitle' => 'Reports',
        ];
        return view('creator/reports/v_add', $data);
    }

    public function reports_insert($id_destination, Request $request){
        DB::table('reports')->insert([
            'id_destination' => $id_destination,
            'count' => $request->count,
            'content' => $request->content,
            'date' => $request->date,
        ]);
        return redirect('reports-destination/'.$id_destination)->with('pesan', 'Data Saved Successfully !');
    }

    public function reports_edit($id){
        $data = [
            'sidebarTitle' => 'Reports',
            'report' => DB::table('reports')->where('id',$id)->first(),
        ];

        return view('creator/reports/v_edit', $data);
    }

    public function reports_update($id, Request $request){
        $id_destination = DB::table('reports')->where('id',$id)->first()->id_destination;
        DB::table('reports')->where('id',$id)->update([
            'count' => $request->count,
            'content' => $request->content,
            'date' => $request->date,
        ]);
        return redirect('reports-destination/'.$id_destination)->with('pesan', 'Data Updated Successfully !');
    }

    public function reports_delete($id){
        $id_destination = DB::table('reports')->where('id',$id)->first()->id_destination;
        DB::table('reports')->where('id',$id)->delete();
        return redirect('reports-destination/'.$id_destination)->with('pesan', 'Data Deleted Successfully !');
    }

}
