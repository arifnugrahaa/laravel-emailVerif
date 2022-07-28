<?php

namespace App\Http\Controllers\Auth;

use App\Events\Auth\UserActivationEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ActivationResendController extends Controller
{
    public function showResendForm()
    {
        return view('auth.activate.resend');
    }

    public function resend(Request $request)
    {
        $this->validateResendRequest($request);

        $user = User::where('email', $request->email)->first();

        event(new UserActivationEmail($user));

        return redirect()->route('login')->withSuccess('Email Aktivasi Sudah Terkirim');
    }

    protected function validateResendRequest(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email'
        ], [
            'email.exists' => 'Email Tidak Terdaftar'
        ]);
    }
}
