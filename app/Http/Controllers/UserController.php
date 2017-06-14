<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    //
    
    public function index(\App\User $user) {
        dd($user->name);
    }
    
}
