<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $user = Auth::user();
        $user->latitude = $request->input('latitude');
        $user->longitude = $request->input('longitude');
        $user->save();

        return response()->json(['message' => 'Location saved successfully.'], 200);
    }
}
