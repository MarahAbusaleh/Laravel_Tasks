<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'category_id', 'image_path'];

    public function category() //category is the name of relationship
    {
        return $this->belongsTo(Category::class);
    }
}
