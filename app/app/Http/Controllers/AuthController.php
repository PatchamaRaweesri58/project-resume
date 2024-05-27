<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{


    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        'g-recaptcha-response' => 'required|captcha',
        'email' => 'required',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->route('login')->with('error', 'CAPTCHA validation failed. Please try again.');
    }

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $token = $user->createToken('AuthToken')->plainTextToken;

        return redirect()->route('datatables')->with('success', 'Login successful.');
    } else {
        return redirect()->route('login')->with('error', 'Invalid email or password.');
    }
}

    public function showForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Validate input including email and password
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);
    
        // Verify reCAPTCHA
        $token = $request->input('g-recaptcha-response');
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $token,
        ]);
        $responseData = $response->json();
        
        if ($responseData['success']) {
            // If reCAPTCHA verification successful
            // Hash the password
            $hashedPassword = bcrypt($request->password);
            
            // Create new user
            $user = new User();
            $user->email = $request->email;
            $user->password = $hashedPassword;
            $user->save();
    
            // Redirect to login page with success message
            return redirect()->route('login')->with('success', 'Registration successful!');
        } else {
            // If reCAPTCHA verification fails
            return back()->withErrors(['captcha' => 'Please complete the reCAPTCHA.'])->withInput();
        }
    }
}
