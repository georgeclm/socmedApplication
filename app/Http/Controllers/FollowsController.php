<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FollowsController extends Controller
{

    public function store(User $user)
    {
        // this use the profile user pivot table to connect between the follower and following
        //dd($user->profile->followers[0]->id);
        // Redirect::back();
        // to refresh the page
        return auth()->user()->following()->toggle($user->profile);
    }
}
