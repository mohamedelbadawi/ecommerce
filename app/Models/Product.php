<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function sizes()
    {
        return array_unique($this->attributes()->pluck('size')->toArray());
    }

    public function totalStock()
    {
        return $this->attributes()->pluck('stock')->sum();
    }

    public function colors()
    {
        return array_unique($this->attributes()->pluck('color')->toArray());
    }

    public function status()
    {
        return $this->status ? 'Active' : 'InActive';
    }

    public function createdAt()
    {
        return $this->created_at->diffForHumans();
    }

    public function media()
    {
        return $this->hasMany(Media::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
