<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content_Forum extends Model
{
    use HasFactory;
    protected $table = "content_forum";

    protected $fillable = [
        'forum',
        'created_by',
    ];
}
