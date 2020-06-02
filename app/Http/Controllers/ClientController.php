<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home() {

        return view('client.home');
    }

    public function  order(){

        return view('client.order');
    }

    public function  program(){

        return view('client.program');
    }

    public function  coaches()
    {
        $coaches = User::where('role','Тренер')->paginate(8);

        return view('client.coaches',compact('coaches'));
    }

    public function  schedule(){

        return view('client.schedule');
    }

    public function  contacts(){
        $user = User::where('id',auth()->user()->id)->first();
        return view('client.contacts',compact('user'));
    }
}
