<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // protected $table = "categories";
    protected $fillable = ['name', 'desc', 'image_path'];

    public function items() //items is the name of relationship
    {
        return $this->hasMany(Item::class);
    }
}
