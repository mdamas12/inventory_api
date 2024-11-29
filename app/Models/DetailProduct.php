<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailProduct extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'detail_products';
    protected $fillable = [
        'value',
        'description',
        'status',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function feature(){
        return $this->belongsTo(Feature::class);
    }
}
