<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'name',
            'body',
            'images',
            'isMain',
            'price',
            'user_id',
            'category_id',
            'status'
        ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function media()
    {
        return $this->hasMany(Media::class);
    }

    public function card()
    {
        return $this->belongsToMany(Product::class);
    }
}
