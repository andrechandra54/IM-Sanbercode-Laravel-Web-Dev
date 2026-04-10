<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'image', 'description', 'price', 'stock', 'category_id'];

    public function categories() {

        return $this->belongsTo(Categories::class, 'category_id');

    }
}
