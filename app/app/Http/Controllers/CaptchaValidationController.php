<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CaptchaValidationController extends Controller
{
    public function validateCaptcha(Request $request)
    {
        $token = $request->input('token');
        $secretKey = 'YOUR_SECRET_KEY'; // Replace with your actual secret key
    
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $secretKey,
            'response' => $token,
        ]);
    
        $responseData = json_decode($response->getBody(), true);
    
        if ($responseData['success'] && $responseData['score'] >= 0.5) {
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['success' => false, 'error' => 'reCAPTCHA validation failed'], 422);
        }
    }
}
