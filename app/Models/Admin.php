<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = "admin";
    protected $fillable = [
        'admin_username',
        'firstname',
        'middlename',
        'lastname',
        'admin_password',
        'admin_email',
        'employee_id',
        'role',
        'fname',
        'mname',
        'lname',
        'motto',
        'profile_image'
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['admin_password'] = bcrypt($value);
    }
    protected $hidden = [
        'admin_password', 'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->admin_password;
    }
}
