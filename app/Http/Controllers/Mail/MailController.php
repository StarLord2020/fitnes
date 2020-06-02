<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Mail\Message;
use App\Mail\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(Request $request)
    {
        $subject='Обратная связь';
        $sender=$request['email'];
            Mail::to('fitnesMuscleclub@gmail.com')
                ->send(new Message(['name' =>($request['name']),
                    'subject'=>($request['subject']),
                    'message'=>($request['message']),
                    'email'=>($request['email']),
                ],
                    $subject,$sender));

            return response(['result' => 'ok']);
    }
}
