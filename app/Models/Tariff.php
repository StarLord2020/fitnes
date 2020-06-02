<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tariff extends Model
{
    protected $fillable = [
        'name','price'
    ];

    public function getTarriffs()
    {
        return DB::table('tariffs')->get();
    }
}
