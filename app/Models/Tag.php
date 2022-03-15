<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function status()
    {
        return $this->status?'Active':'InActive';
    }

    public function createdAt()
    {
        return $this->created_at->diffForHumans();
    }
}
