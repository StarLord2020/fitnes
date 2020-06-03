<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            ['surname'=>'admin',
                'name' => 'admin',
                'patronymic' => 'admin',
                'email'=>'gurax45@gmail.com',
                'password'=>\Illuminate\Support\Facades\Hash::make('qwerty777'),
                'number'=>'3805642352',
                'address'=>'admin',
                'description'=>null,
                'sex'=>'Мужчина',
                'role'=>'Адмін'
            ],
            ['surname'=>'Iваванов',
                'name' => 'Iван',
                'patronymic' => 'Iванович',
                'email'=>'coauchFitnes@gmail.com',
                'password'=>\Illuminate\Support\Facades\Hash::make('fitnes01'),
                'number'=>'3805642352',
                'address'=>'г.Краматорськ',
                'description'=>'Кращий тренер в світі',
                'sex'=>'Мужчина',
                'role'=>'Тренер'
            ],
            ['surname'=>'Тiтенко',
                'name' => 'Вова',
                'patronymic' => 'Олександрович',
                'email'=>'coauchFitnes1@gmail.com',
                'password'=>\Illuminate\Support\Facades\Hash::make('fitnes02'),
                'number'=>'+3805642652',
                'address'=>'г.Краматорськ',
                'description'=>'Кращий тренер в світі2',
                'sex'=>'Мужчина',
                'role'=>'Тренер'
            ],


        ];

        User::insert($users);
    }
}
