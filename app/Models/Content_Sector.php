<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content_Sector extends Model
{
    use HasFactory;
    protected $table = "content_sector";

    protected $fillable = [
        'sector',
        'created_by',
      
    ];
}
