<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class C_Comment extends Controller
{

    public function __construct()
    {
    }

    public function store_comment($id_destination, Request $request){
        DB::table('comments')->insert([
            'id_destination' => $id_destination,
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content,
            'rating' => $request->rating,
        ]);
        return redirect()->back()->withErrors(['msg' => 'Data Berhasil Di Input']);

    }
}
