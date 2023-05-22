<?php

namespace App\Http\Controllers;

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

        $data = [
            'sidebarTitle' => 'Destinations',
            'destinations' => DB::table('destinations')->get()
        ];
        return view('destinations/v_index', $data);
    }

    public function add()
    {
        $data = [
            'sidebarTitle' => 'Destinations',
            'categories' => DB::table('categories')->get()
        ];
        return view('destinations/v_add', $data);
    }

    public function insert(Request $request)
    {
        DB::table('destinations')->insert([
            'id_category' => $request->id_category,
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'contact' => $request->contact,
            'status' => '0',
            'image' => 'bg_1.jpg|bg_2.jpg|bg_3.jpg',
        ]);
        return redirect()->route('destinations')->with('pesan', 'Data Saved Successfully !');
    }

    public function edit($id)
    {
        $data = [
            'sidebarTitle' => 'Destinations',
            'destinations' => DB::table('destinations')->where('id',$id)->first(),
            'categories' => DB::table('categories')->get()
        ];

        return view('destinations/v_edit', $data);
    }

    public function update($id, Request $request)
    {
        DB::table('destinations')->where('id',$id)->update([
            'id_category' => $request->id_category,
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'contact' => $request->contact,
            'status' => '0',
            'image' => 'bg_1.jpg|bg_2.jpg|bg_3.jpg',
        ]);
        return redirect()->route('destinations')->with('pesan', 'Data Updated Successfully !');
    }

    public function delete($id)
    {
        DB::table('destinations')->where('id',$id)->delete();
        return redirect()->route('destinations')->with('pesan', 'Data Deleted Successfully !');
    }
}
