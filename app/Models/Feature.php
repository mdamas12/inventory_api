<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feature extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'features';
    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    public function detailProduct(){
        return $this->hasMany(DetailProduct::class);
    }

}
