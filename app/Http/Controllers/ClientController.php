<?php

namespace App\Http\Controllers;

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

    public function  coaches(){

        return view('client.coaches');
    }

    public function  schedule(){

        return view('client.schedule');
    }

    public function  contacts(){

        return view('client.contacts');
    }
}
