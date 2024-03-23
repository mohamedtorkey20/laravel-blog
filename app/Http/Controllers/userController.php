<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
    {
        $users = User::withCount('posts')->paginate(10);
        return view('users.index', compact('users'));
    }

}
