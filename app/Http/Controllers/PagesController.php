<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function home()
    {
        return view('home');
    }

    public function overons()
    {
        return view('overons');
    }

    public function shop()
    {
        return view('shop');
    }

    public function profiel()
    {
        return view('profiel');
    }

    public function control()
    {
        return view('controlpanel');
    }
}
