<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $fillable = [
        'user_id','date','time','coach_id','tariff_id','message'
    ];

    public function getAll()
    {
        return DB::table('orders')
            ->join('users','users.id',"=",'orders.user_id')
            ->join('tariffs','tariffs.id','=','orders.tariff_id')
            ->select('orders.id', DB::raw("CONCAT(users.name,' ',users.surname) AS user"),
                'orders.coach_id','orders.date','orders.time',
                'orders.message','tariffs.name as tariff',
                'users.number','users.email')
            ->get();
    }
}
