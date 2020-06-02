<?php

namespace App\Http\Controllers;

use App\Models\Tariff;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home() {

        return view('client.home');
    }

    public function  order($plan=null){
        $param='none';
        $tariffs=(new Tariff())->getTarriffs();
        $coaches=(new User())->getAll();
        if($tariffs->contains('id','=',$plan))
        {
            $param=$plan;
        }

        return view('client.order',compact(['tariffs','param','coaches']));
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
