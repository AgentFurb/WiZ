<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class Chartcontroller extends Controller
{
    public function homepagecharts(){

        $smallfella = User::count();


        return view('home', compact('smallfella'));

    }
}
