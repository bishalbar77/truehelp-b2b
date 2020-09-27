<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Order extends Model implements Searchable
{
    protected $fillable = ['order_number', 'order_display_ids','order_dispaly_desc', 'status', 'tat', 'employer_id', 'employee_id', 'received_date', 'employee_id'];

    public function getSearchResult(): SearchResult
    {
        $url = route('reports.show', $this->id);

        return new SearchResult(
            $this,
            $this->order_number,
            $this->order_display_ids,
            $this->order_dispaly_desc,
            $url
        );
    }
}
