<?php

namespace App\Exports;


use App\Models\Order;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StatisticExport implements FromView
{
    public function view(): View
    {
        $todayDate = date("Y-m-d");
        return view('admin.statistic.export', [
            'orders' => (new Order)->getStatistic(),
            'profit' => (new Order)->getSum(),
            'coaches' => (new User())->getAll()
        ]);
    }
}
