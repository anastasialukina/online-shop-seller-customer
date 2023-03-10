<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectAuthenticatedUsersController extends Controller
{
    public function home()
    {
        if (auth()->user()->role->value == 'customer') {
            return redirect('/products');
        } elseif (auth()->user()->role->value == 'seller') {
            return redirect('/orders');
        } else {
            dd(auth()->user()->role->value);
            return auth()->logout();
        }
    }
}
