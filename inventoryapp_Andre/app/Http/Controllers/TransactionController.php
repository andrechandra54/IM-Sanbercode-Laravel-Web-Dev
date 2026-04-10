<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transactions;
use App\Models\Products;

class TransactionController extends Controller
{
    public function index() {
        
        if(Auth::user()->role === 'admin') {

            $transactions = Transactions::get();

        }
        else {

            $transactions = Transactions::where('user_id', Auth::user()->id)->get();

        }

        return view('transaction.index', ['transactions' => $transactions]);

    }

    // public function create() {

    //     $products = Products::get();

    //     return view('transaction.create', ['products' => $products]);

    // }

    public function create($id) {

        $product = Products::find($id);

        return view('transaction.add', ['product' => $product]);

    }

    public function store(Request $request) {

        $request->validate([
            'product_id' => 'required',
            'amount' => 'required|numeric'
        ]);

        $transactions = new Transactions;

        $transactions->user_id = Auth::user()->id;
        $transactions->product_id = $request->input('product_id');
        $transactions->amount = $request->input('amount');
        $transactions->notes = $request->input('notes');

        $transactions->save();

        $products = Products::find($transactions->product_id);
        $products->decrement('stock', $transactions->amount);

        return redirect('/transaction')->with('success', 'Transaction Added');

    }

    public function edit($id) {

        $transaction = Transactions::find($id);

        return view('transaction.edit', ['transaction' => $transaction]);

    }

    public function update(Request $request, $id) {

        $request->validate([
            'type' => 'required',
        ]);

        $transaction = Transactions::find($id);

        $transaction->type = $request->input('type');

        $transaction->save();

        return redirect('/transaction')->with('success', 'Type Updated');

    }
}
