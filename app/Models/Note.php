<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['title', 'content', 'folder_id'];

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
}