@extends('layouts.master')
@section('title')
    @if (Auth::check() && Auth::user()->role === 'admin')
        Transactions List
    @else
        Your Transactions
    @endif
@endsection
@section('content')

    @if (session('success'))

        <div class="alert alert-success">
            {{session('success')}};
        </div>
        
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">Type</th>
                <th scope="col">Amount</th>
                <th scope="col">Notes</th>
                <th scope="col">Transaction Time</th>
                @if (Auth::check() && Auth::user()->role === 'admin')
                <th scope="col">User</th>
                <th scope="col">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->products->name}}</td>
                    <td>{{$item->type}}</td>
                    <td>{{$item->amount}}</td>
                    <td>{{$item->notes}}</td>
                    <td>{{$item->created_at}}</td>
                    @if (Auth::check() && Auth::user()->role === 'admin')
                    <td>{{$item->user->name}}</td>
                    <td>

                        <form action="/transaction/{{$item->id}}" method="POST">
                        
                            @csrf
                            @method("DELETE")

                            <a href="/transaction/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                        </form>

                    </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td>NO TRANSACTIONS</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="/" class="btn btn-secondary btn-sm">Return</a>
@endsection