<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','login_type', 'name', 'folder_id', 'login_username', 'login_password', 'uri', 'notes'];

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
}
