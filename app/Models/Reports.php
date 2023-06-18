<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reports extends Model
{
    protected $table = "reports";
 
    protected $fillable = ['count','content','date'];

    public function dataReport()
    {
        dd('masuk');
    }
}
