<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function create() {
        return view('category.add');
    }

    public function store(Request $request) {
        
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required'
        ], [
            'required' => ":attribute wajib diisi",
            'min' => ":attribute minimal :min karakter"
        ]);

        $now = Carbon::now();

        DB::table('categories')->insert([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'created_at' => $now,
            'updated_at' => $now
        ]);

        return redirect('/category')->with('success', 'Category Added');

    }

    public function index() {
        
        $categories = DB::table('categories')->get();

        return view('category.index', ['categories' => $categories]);

    }

    public function show($id) {

        $category = DB::table('categories')->find($id);

        return view('category.detail', ['category' => $category]);

    }

    public function edit($id) {

        $category = DB::table('categories')->find($id);

        return view('category.edit', ['category' => $category]);

    }

    public function update($id, Request $request) {

        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required'
        ], [
            'required' => ":attribute wajib diisi",
            'min' => ":attribute minimal :min karakter"
        ]);

        $now = Carbon::now();

        DB::table('categories')->where('id', $id)->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'updated_at' => $now
        ]);

        return redirect('/category')->with('success', 'Category Updated');
    }

    public function destroy($id) {

        DB::table('categories')->where('id', $id)->delete();

        return redirect('/category')->with('success', 'Category Deleted');

    }
}
