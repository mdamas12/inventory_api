<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'min_stock',
        'status',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function detailProduct(){
        return $this->hasMany(DetailProduct::class);
    }

}
