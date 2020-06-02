<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home() {

        $coaches = User::where('role','Тренер')->limit(4)->get();
        $programs = Program::where('id','<>',null)->limit(4)->get();

        return view('client.home',['coaches'=>$coaches,'programs'=>$programs]);
    }

    public function  order(){

        return view('client.order');
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

        return view('client.contacts');
    }
}
