<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectAuthenticatedUsersController extends Controller
{
    public function home()
    {
        if (auth()->user()->role == 'customer') {
            return redirect('/products');
        } elseif (auth()->user()->role == 'seller') {
            return redirect('/orders');
        } else {
            return auth()->logout();
        }
    }
}
