<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StatisticExport implements FromView
{
    public function view(): View
    {
        $todayDate = date("Y-m-d");
        return view('admin.statistic.export', [
//            'statistics' => (new Chart())->specialtiesForBid($todayDate),
//            'statisticsResumes' => (new Chart())->specialtiesForResume($todayDate),
//            'realizationBids' => (new Chart())->getStatisticsForSpecialties(),
//            'salary' => (new Chart())->getSalaryForSpecialties()
        ]);
    }
}
