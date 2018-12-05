<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class SearchController extends Controller
{
    public function index()
    {
        return view('search.search');
    }

    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $users=DB::table('users')->where('email', 'like','%' .$request->search. "%")->get();
            if($users)
            {
                foreach ($users as $key => $user) 
                {
                    $output.= 
                    '<div class="row users usersdata">'.
                    '<div class="img-col"><img src="https://www.w3schools.com/howto/img_avatar.png" class="profile-img-small"></div>'.
                    '<div class="col-4">'.$user->email.'</div>'.
                    '<div class="col">'.$user->rechten.'</div>'.
                    '<div class="col">'.$user->vestiging.'</div>'.
                    '<div class="col">'.$user->id.'</div>'.
                    '</div>';
                }
            return Response($output);
            }
        }
    }
}
