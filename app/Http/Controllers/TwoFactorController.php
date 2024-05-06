<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\TwoFactorCode;
use Illuminate\Support\Facades\Session;

class TwoFactorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        // Check if user is authenticated
        if (!$user) {
            // You can redirect to the login page or return an error response
            return redirect()->route('login')->withErrors('Please log in first.');
        }

        return response()->view('auth.verify', ['user' => $user]);
    }


    public function store(Request $request)
    {
        $user = auth()->user();

        // Join the code array into a single string
        $code = implode('', $request->input('code'));

        if (empty($code)) { // Check if $code is blank
            return redirect()->route('verify.index')->withErrors(['code' => 'Verification code is required']);
        }

        if ($code == $user->code) {
            $user->restCode();
            return redirect()->route('dashboard');
        }

        return redirect()->back()->withErrors(['code' => 'Invalid verification code']);
    }



    public function resendotp(Request $request)
    {
        $user = $request->user(); // or however you retrieve the user in your application

        if ($user) {
            $user->generateCode();
            $user->notify(new TwoFactorCode());
            return response()->view('auth.verify', ['user' => $user]);
        }
    }
}
