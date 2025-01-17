<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    public function category(){
        return $this->hasMany(Category::class);
    }
}
