<?php

namespace App\Exports;

use App\Employee;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeesExport implements FromArray, WithHeadings
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
            'employee_types_id',
            'student_code',
            'parent_first_name',
            'parent_middle_name',
            'parent_last_name',
            'parent_dob',
            'parent_gender',
            'co_relation',
            'parent_email',
            'parent_mobile',
        ];
    }
}