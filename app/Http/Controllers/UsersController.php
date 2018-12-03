<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    
    public function control()
    {

        $users = User::all();


        return view('controlpanel', compact('users'));
    }
}
