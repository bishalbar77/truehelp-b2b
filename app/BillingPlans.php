<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingPlans extends Model
{
    protected $fillable = [
        'code', 'name', 'description','status'
    ];
}
