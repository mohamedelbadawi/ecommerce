<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Address extends Model
{
    use HasFactory, SearchableTrait;

    protected $guarded = [];
    protected $searchable = [

        'columns' => [
            'addresses.street_address' => 10,
            'addresses.city' => 10,
            'addresses.code' => 10,
            'users.name' => 10,
        ],
        'joins' => [
            'users' => ['users.id', 'addresses.user_id'],

        ],

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
