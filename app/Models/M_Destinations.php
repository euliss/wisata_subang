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
        return DB::table('destinations')->count();
    }
}
