<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        return [];
    }

    public function headings(): array
    {
        return [
            'first_name',
            'middle_name',
            'last_name',
            'mobile',
            'gender',
            'dob',
            'email',
            'address',
            'guardian_name',
            'guardian_phone',
            'guardian_relation',
        ];
    }
}