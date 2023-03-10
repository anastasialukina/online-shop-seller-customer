<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        if (auth()->user()->role->value == 'customer')
            $orders = auth()->user()->orders;
        else if (auth()->user()->role->value == 'seller') {
            $sellersProducts = auth()->user()->products;

            //find products based on orders' product_name
            $orders = Order::where(function ($query) use ($sellersProducts) {
                $query->whereIn('product_name', $sellersProducts->pluck('name'))
                    ->orWhereIn('product_id', $sellersProducts->pluck('id'));
            })
                ->where('min_price', '<=', $sellersProducts->price)
                ->where('max_price', '>=', $sellersProducts->price)
                ->get();
        } else {
            $orders = null;
        }

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::where('status', 'active')->get();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            //product_name required if product_id is not provided
            //product_id required if product_name is not provided
            'product_name' => 'required_if:product_id,==,null',
            'product_id' => 'required_if:product_name,==,null',

            'min_price' => 'required',
            'max_price' => 'required',
            'product_type' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/orders/create')
                ->withErrors($validator)
                ->withInput();
        }

        //validator ends

        $order = new Order();
        $order->user_id = auth()->user()->id;

        //if product_id is provided, use it
        //else, use product_name
        if ($request->input('product_id') != null) {
            $order->product_id = $request->input('product_id');
        } else {
            //get product_id from product_name or write down the product_name for later
            // - if product will be created
            if (Product::where('name', $request->input('product_name'))->first() != null) {
                $order->product_id = Product::where('name', $request->input('product_name'))->first()->id;
            } else {
                $order->product_name = $request->input('product_name');
            }
        }

        $order->min_price = $request->input('min_price');
        $order->max_price = $request->input('max_price');
        $order->type = $request->input('product_type');
        $order->status = 'created'; //created, pending
        $order->save();

        return redirect('/orders');
    }
}
