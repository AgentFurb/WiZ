<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function control()
    {

        $users = User::all();


        return view('controlpanel', compact('users'));
    }

    public function show(User $user)
    {

        return view('Users.userdetail', compact('user'));
    }

    public function edit(User $user)
    {
        return view('Users.edituser', compact('user'));
    }

    public function update(User $user)
    {

        $this->validate(request(), [
            'voornaam' => 'required', 'string', 'max:255',
            'achternaam' => 'required', 'string', 'max:255',
            'rechten' => 'required', 'string', 'max:255',
            'vestiging' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
        ]);

        $user->voornaam = request('voornaam');
        $user->achternaam = request('achternaam');
        $user->rechten = request('rechten');
        $user->vestiging = request('vestiging');
        $user->email = request('email');

        $user->save();

        return redirect('/controlpanel');

    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/controlpanel');

    }


    public function create()
    {
        return view('Users.usercreate');
    }
}
