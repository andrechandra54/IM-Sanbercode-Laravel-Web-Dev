<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $table = 'transactions';

    protected $fillable = ['product_id', 'user_id', 'type', 'amount', 'notes'];

    public function user() {

        return $this->belongsTo(User::class, 'user_id');

    }

    public function products() {

        return $this->belongsTo(Products::class, 'product_id');

    }
}
