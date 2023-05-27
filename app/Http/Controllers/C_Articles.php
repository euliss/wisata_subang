<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class C_Articles extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $data = [
            'sidebarTitle' => 'Articles',
            'articles' => DB::table('articles')->get()
        ];
        return view('admin/articles/v_index', $data);
    }

    public function add()
    {
        $data = [
            'sidebarTitle' => 'Articles',
        ];
        return view('admin/articles/v_add', $data);
    }

    public function insert(Request $request)
    {
        DB::table('articles')->insert([
            'title'   => $request->title,
            'description'   => $request->description,
        ]);
        return redirect()->route('articles')->with('pesan', 'Data Saved Successfully !');
    }

    public function edit($id)
    {
        $data = [
            'sidebarTitle' => 'Articles',
            'article' => DB::table('articles')->where('id',$id)->first()
        ];

        return view('admin/articles/v_edit', $data);
    }

    public function update($id, Request $request)
    {
        DB::table('articles')->where('id',$id)->update([
            'title'   => $request->title,
            'description'   => $request->description,
        ]);
        return redirect()->route('articles')->with('pesan', 'Data Updated Successfully !');
    }

    public function delete($id)
    {
        DB::table('articles')->where('id',$id)->delete();
        return redirect()->route('articles')->with('pesan', 'Data Deleted Successfully !');
    }
}
