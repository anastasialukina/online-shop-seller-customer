<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 'active')->get();
        //$products = Product::all();

        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function create()
    {
        if (auth()->user()->role->value == 'seller')
            return view('products.create');
        else
            return redirect('/products');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'price' => 'required',
            'type' => 'required',
        ]);

        //validator fails
        if ($validator->fails()) {
            return redirect('/products/create')
                ->withErrors($validator)
                ->withInput();
        }

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->status = $request->input('status');
        $product->price = $request->input('price');
        $product->save();

        //$product->users()->attach(auth()->user()->id);
        DB::table('users_products')->insert([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
            'type' => $request->input('type'),
        ]);
        return redirect('/products');
    }
}
