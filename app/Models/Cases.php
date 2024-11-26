<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;
    protected $table = "case";
    protected $fillable = [
        'user_id',
        'identity',
        'guardian_name',
        'relation',
        'victim_name',
        'address',
        'gender',
        'age',
        'birthdate',
        'sector',
        'contact',
        'case',
        'summary',
        'report',
        'reference_number',
        'status',
        'email',
        'assign',
    ];
}
