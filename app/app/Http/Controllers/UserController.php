<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showLocations()
    {
        $users = User::whereNotNull('latitude')->whereNotNull('longitude')->get();
        return view('user.locations', compact('users'));
    }
}