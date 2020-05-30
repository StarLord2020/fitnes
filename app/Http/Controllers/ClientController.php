<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function main() {

        return view('client.layouts.index');
    }
}
