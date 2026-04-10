<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\Products;
use App\Models\Categories;
use Carbon\Carbon;
use File;

class ProductController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'auth',
            new Middleware('admin', except: ['index', 'show'])
        ];
    }

    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $products = Products::get();

        return view('product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::get();

        return view('product.add', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ], [
            'required' => ":attribute wajib diisi",
            'min' => ":attribute minimal :min karakter"
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('image'), $imageName);

        $now = Carbon::now();

        $product = new Products;

        $product->name = $request->input('name');
        $product->image = $imageName;
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->category_id = $request->input('category_id');
        $product->created_at = $now;
        $product->updated_at = $now;

        $product->save();

        return redirect('/product')->with('success', 'Product Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Products::find($id);

        return view('product.detail', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Products::find($id);
        $categories = Categories::get();

        return view('product.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'image' => 'mimes:jpg,jpeg,png|max:2048',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ], [
            'required' => ":attribute wajib diisi",
            'min' => ":attribute minimal :min karakter"
        ]);

        $product = Products::find($id);

        if($request->hasFile('image')) {
            if($product->image) {
                if(File::exists(public_path('image/'.$product->image))) {
                    File::delete(public_path('image/'.$product->image));
                }

                $imageName = time().'.'.$request->image->extension();

                $request->image->move(public_path('image'), $imageName);

                $product->image = $imageName;
            }
        }

        $now = Carbon::now();

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->category_id = $request->input('category_id');
        $product->updated_at = $now;

        $product->save();

        return redirect('/product')->with('success', 'Product Edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::find($id);

        if($product->image) {
            if(File::exists(public_path('image/'.$product->image))) {
                File::delete(public_path('image/'.$product->image));
            }
        }

        $product->delete();

        return redirect('/product')->with('success', 'Product Deleted');
    }
}
