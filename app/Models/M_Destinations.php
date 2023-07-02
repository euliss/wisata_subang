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
        if(auth()->user()->level == 1){
            return DB::table('destinations')->count();
        }else{
            return DB::table('user_destinations')->where('id_user',auth()->user()->id)->count();
        }
    }
}
