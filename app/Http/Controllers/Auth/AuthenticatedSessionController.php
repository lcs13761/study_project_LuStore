<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return 
     */
    public function create()
    {
        return view('auth.login.login');
    }

    // /**
    //  * Handle an incoming authentication request.
    //  *
    //  * @param  \App\Http\Requests\Auth\LoginRequest  $request
    //  * @return \Illuminate\Http\RedirectResponse
    //  */
    public function store()
    {
        // $request->authenticate();

        // $request->session()->regenerate();

        // return redirect()->intended(RouteServiceProvider::HOME);
    }

// /**
//  * Destroy an authenticated session.
//  *
//  * @param  \Illuminate\Http\Request  $request
//  * @return \Illuminate\Http\RedirectResponse
//  */
// public function destroy(Request $request)
// {
//     Auth::guard('web')->logout();

//     $request->session()->invalidate();

//     $request->session()->regenerateToken();

//     return redirect('/login');
// }
}