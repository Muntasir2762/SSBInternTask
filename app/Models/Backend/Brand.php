<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public function category()
    {
    	return $this->hasMany(Category::class);
    }

    public function products()
    {
    	return $this->hasMany(Product::class);
    }


}
