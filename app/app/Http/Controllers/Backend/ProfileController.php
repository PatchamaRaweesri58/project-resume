<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use Yajra\DataTables\Facades\DataTables;

class ProfileController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {

        $profiles = Profile::paginate(2);
        return view('resume.Backend.profile.datatables',compact('profiles'));
    }
 
    //Datatables
    public function data(Request $resuest)
    {
        $profiles = Profile::select(['id', 'header', 'contents', 'created_at', 'updated_at']);

        return DataTables::of($profiles)->toJson();
    }
}
