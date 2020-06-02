<?php

use Illuminate\Database\Seeder;

class TariffSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tariffs=[
            [
                'name' => 'одне тренування',
                'price'=>'7'
            ],
            [
                'name' => 'оплата за місяць',
                'price'=>'65'
            ],
            [
                'name' => 'оплата за рік',
                'price'=>'125'
            ]
        ];

        \App\Models\Tariff::insert($tariffs);
    }
}
