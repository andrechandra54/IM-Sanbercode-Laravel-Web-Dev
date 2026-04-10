<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Transactions;

class DashboardController extends Controller
{
    public function home() {

        $products = Products::latest()->take(3)->get();

        $transactions = Transactions::latest()->take(3)->get();

        return view('index', ['products' => $products, 'transactions' => $transactions]);

    }
}
