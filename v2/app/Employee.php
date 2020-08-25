<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name', 'middle_name', 'last_name','mobile', 'gender', 'source_name','dob', 'address', 'api_key','device_id', 'email',
    ];
}
