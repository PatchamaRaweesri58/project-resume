<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormatController extends Controller
{
    function index()
    {
        return view('resume.Backend.format.table');
    }

    function calendar()
    {
        return view('resume.Backend.format.calendar');
    }

    function forms()
    {
        return view('resume.Backend.format.forms');
    }

    function Icon()
    {
        return view('resume.Backend.format.icons');
    }

    function license()
    {
        return view('resume.Backend.format.License');
    }

    function getLogin()
    {
        return view('resume.Backend.format.login');
    }

    function profile()
    {
        return view('resume.Backend.format.profile');
    }

    function getRegister()
    {
        return view('resume.Backend.format.register');
    }

    function setpassword()
    {
        return view('resume.Backend.format.reset-password');
    }

    function dashboard()
    {
        return view('resume.Backend.format.index');
    }
 

}
