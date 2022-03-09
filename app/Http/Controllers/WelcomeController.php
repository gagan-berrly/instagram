<?php

namespace App\Http\Controllers;

use App\Image;
use App\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    

    public function index()
    {
        $users = User::all();
        $images = Image::all();
        
        return view('welcome',['users' => $users]);
    }
}
