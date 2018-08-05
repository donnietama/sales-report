<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $resource = User::select('id','name')->where('name', '=', \Auth::user()->name)->first();
        return $resource;
    }
}
