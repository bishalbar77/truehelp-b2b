<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Employee extends Model implements Searchable
{
    protected $fillable = [
        'first_name', 
        'middle_name', 
        'last_name',
        'mobile', 
        'gender', 
        'source_name',
        'dob', 
        'address', 
        'api_key',
        'device_id', 
        'email', 
        'guardian_name',
        'guardian_phone', 
        'guardian_relation', 
        'user_type',
        'is_active',
    ];

    public function getSearchResult(): SearchResult
    {
        $url = route('users.show', $this->id);

        return new SearchResult(
            $this,
            $this->employee_code,
            $url
         );
    }
}
