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


    public function newuser()
    {
        return view('Users.usercreate');
    }

    public function store()
    {
        $this->validate(request(), [
            'voornaam' => ['required', 'string', 'max:255'],
            'achternaam' => ['required', 'string', 'max:255'],
            'rechten' => ['required', 'string', 'max:255'],
            'vestiging' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        
        $user = User::create(request(['voornaam', 'achternaam', 'password', 'rechten', 'vestiging', 'email']));

        
        // $user->voornaam = $request->voornaam;
        // $user->achternaam = $request->achternaam;
        // $user->rechten = $request->rechten;
        // $user->vestiging = $request->vestiging;
        // $user->email = $request->email;
        // $user->password = bcrypt( $request->password );
        // $user->remember_token = $request->_token;
        // $user->save();

        return redirect('/controlpanel');

    }
}
