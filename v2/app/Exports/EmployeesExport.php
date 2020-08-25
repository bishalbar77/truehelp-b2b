<?php

namespace App\Exports;

use App\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // dd(Employee::all());
        return Employee::all();
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
        ];
    }
}
