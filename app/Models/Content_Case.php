<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content_Case extends Model
{
    use HasFactory;
    protected $table = "content_case";

    protected $fillable = [
        'case',
        'created_by',
      
    ];
}
