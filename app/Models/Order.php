<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
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
            ->select('orders.id', DB::raw("CONCAT(users.surname,' ',users.name,' ',users.patronymic) AS user"),
                'orders.coach_id','orders.date','orders.time',
                'orders.message','tariffs.name as tariff',
                'users.number','users.email')
            ->get();
    }
    public function getStatistic()
    {
        $todayDate = date("Y-m-d");
        $start_date = clone(new Carbon($todayDate))->addDays(-30);

       $statistic= DB::table('orders')
            ->join('users','users.id',"=",'orders.user_id')
            ->join('tariffs','tariffs.id','=','orders.tariff_id')
            ->whereBetween('orders.date',array($start_date, $todayDate))
            ->select('orders.id', DB::raw("CONCAT(users.surname,' ',users.name,' ',users.patronymic) AS user"),
                'orders.coach_id','orders.date','orders.time',
                'orders.message','tariffs.name as tariff',
                'users.number','users.email')
            ->get();

        return (['statistic'=>$statistic,'date'=>$start_date->format('Y-m-d').'/'.$todayDate]);
    }

    public function getSum()
    {
        $todayDate = date("Y-m-d");
        $start_date = clone(new Carbon($todayDate))->addDays(-30);
        $sum= DB::table('orders')
            ->join('users','users.id',"=",'orders.user_id')
            ->join('tariffs','tariffs.id','=','orders.tariff_id')
            ->whereBetween('orders.date',array($start_date, $todayDate))
            ->select(DB::raw('SUM(tariffs.price) as tariff'))
            ->first();
        return (['sum'=>$sum,'date'=>$start_date->format('Y-m-d').'/'.$todayDate]);
    }
}
