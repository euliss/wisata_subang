<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class C_Reports extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $data_report = DB::table('reports')
            ->select('reports.*','destinations.name')
            ->leftJoin('destinations', 'destinations.id', '=', 'reports.id_destination');

        $data_graphic = DB::table('reports')
            ->select(
                'reports.*', 
                DB::raw('sum(reports.count) as `report_count`'), 
                DB::raw("DATE_FORMAT(reports.date, '%m-%Y') month_year"),  
                DB::raw('YEAR(reports.date) year, MONTH(reports.date) month')
            )
            ->leftJoin('destinations', 'destinations.id', '=', 'reports.id_destination');

        if(isset($_GET['dari_tanggal'])){
            $data_report = $data_report->whereBetween('date',[$_GET['dari_tanggal'],$_GET['sampai_tanggal']]);
            $data_graphic = $data_graphic->whereBetween('reports.date',[$_GET['dari_tanggal'],$_GET['sampai_tanggal']]);
        }
        if (isset($_GET['id_destination']) && $_GET['id_destination'] != "") {
            $data_report = $data_report->where('id_destination',$_GET['id_destination']);
            $data_graphic = $data_graphic->where('id_destination',$_GET['id_destination']);
        }

        $data = [
            'sidebarTitle' => 'Reports',
            'reports' => $data_report->get(),
            'destinations' => DB::table('destinations')->get(),
            'graphic' => $data_graphic->groupby('year','month')->get(),
        ];
        // dd($data);

        return view('admin/reports/v_index', $data);
    }

    public function add(){
        $data = [
            'sidebarTitle' => 'Reports',
            'destination' => DB::table('destinations')->get(),
        ];
        return view('admin/reports/v_add', $data);
    }

    public function store(Request $request){
        DB::table('reports')->insert([
            'id_destination' => $request->id_destination,
            'count' => $request->count,
            'content' => $request->content,
            'date' => $request->date,
        ]);
        return redirect('report/')->with('pesan', 'Data Saved Successfully !');
    }

    public function edit($id){
        $data = [
            'sidebarTitle' => 'Reports',
            'report' => DB::table('reports')->where('id',$id)->first(),
            'destinations' => DB::table('destinations')->get(),
        ];

        return view('admin/reports/v_edit', $data);
    }

    public function update($id, Request $request){
        DB::table('reports')->where('id',$id)->update([
            'id_destination' => $request->id_destination,
            'count' => $request->count,
            'content' => $request->content,
            'date' => $request->date,
        ]);
        return redirect('report/')->with('pesan', 'Data Updated Successfully !');
    }

    public function delete($id){
        DB::table('reports')->where('id',$id)->delete();
        return redirect('report/')->with('pesan', 'Data Deleted Successfully !');
    }

}
