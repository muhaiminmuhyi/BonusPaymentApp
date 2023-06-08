<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class RedirectAuthenticatedUsersController extends Controller
{
    public function home()
    {
        if (auth()->user()->role == 'administrator') {
            return redirect('/dashboard');
        } elseif (auth()->user()->role == 'guest') {
            return redirect('/dashboard');
        } else {
            return auth()->logout();
        }
    }
}
