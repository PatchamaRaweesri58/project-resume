<?php

namespace App\Http\Controllers\Backend\Heder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Header;
use App\Models\Profile;
use App\Models\St;

class HeaderController extends Controller
{
    public function index()
    {
        $header = Header::get();
        $profiles = Profile::get();
        $st = St::get();
        return view('resume.frontend.header',with(['header'=>$header,'profiles'=>$profiles ,'st'=>$st]));
    
    }
}
