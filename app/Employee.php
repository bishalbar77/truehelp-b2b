<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Employee extends Model implements Searchable
{
    protected $guarded = [
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
