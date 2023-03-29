<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','name'];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'category_item');
    }
}
