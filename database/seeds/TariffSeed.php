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
                'name' => 'Одне тренування',
                'price'=>'7'
            ],
            [
                'name' => 'Оплата за місяць',
                'price'=>'65'
            ],
            [
                'name' => 'Оплата за рік',
                'price'=>'125'
            ]
        ];

        \App\Models\Tariff::insert($tariffs);
    }
}
