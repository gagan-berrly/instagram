<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Image;
use App\Like;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        $adminUser = Auth::user();
        $users = User::orderBy('created_at', 'desc')->get();
        $images = Image::all();
        $likes = Like::all();
        $comments = Comment::all();


        if($adminUser->role == 'admin'){
            return view('admin.index', 
            [
                'users' => $users ,
                'images' => $images, 
                'likes' => $likes,
                'comments' => $comments,
                ]
            );
        }else{
            return redirect()->route('home');
        }
    }

    public function fetchAllUsers() {
        $adminUser = Auth::user();
        $users = User::orderBy('created_at', 'desc')->get();

        if($adminUser->role == 'admin'){
            return view('admin.list', 
            [
                'users' => $users ,
                ]
            );
        }else{
            return redirect()->route('home');
        }
    }
}
