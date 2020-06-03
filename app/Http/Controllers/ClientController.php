<?php

namespace App\Http\Controllers;


use App\Models\Program;
use App\Models\Tariff;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home() {

        $coaches = User::where('role','Тренер')->limit(4)->get();
        $programs = Program::where('id','<>',null)->limit(4)->get();
        $tariffs = Tariff::where('id','<>',null)->paginate(3);

        return view('client.home',['coaches'=>$coaches,'programs'=>$programs,'tariffs'=>$tariffs]);
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

    public function  program()
    {
        $programs = Program::where('id','<>',null)->paginate(8);

        return view('client.program',compact('programs'));
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
