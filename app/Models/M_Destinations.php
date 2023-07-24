<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_Destinations extends Model
{
    use HasFactory;

    public function numberOfDestinations()
    {
        if (auth()->user()->level == 1) {
            return DB::table('destinations')->count();
        } else {
            return DB::table('user_destinations')->where('id_user', auth()->user()->id)->count();
        }
    }

    public function jumlahByDestination($id_destination)
    {
        return DB::table('reports')
            ->select('name', DB::raw('SUM(count) as count'))
            ->leftJoin('destinations', 'destinations.id', '=', 'reports.id_destination')
            ->orderBy('reports.count', 'DESC')->where('reports.id_destination', $id_destination)->sum('reports.count');
    }
}
