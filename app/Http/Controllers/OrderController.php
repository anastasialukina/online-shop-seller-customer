<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('orders.index');
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store()
    {
        return redirect('/orders');
    }
}
