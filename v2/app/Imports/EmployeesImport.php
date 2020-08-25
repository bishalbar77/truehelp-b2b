<?php

namespace App\Imports;

use App\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'first_name'     => $row['first_name'],
            'middle_name'     => $row['middle_name'],
            'last_name'     => $row['last_name'],
            'mobile'     => $row['mobile'],
            'gender'     => $row['gender'],
            'dob'     => $row['dob'],
            'email'    => $row['email'], 
            'address'    => $row['address'], 
            'password' => \Hash::make('admin123'),
        ]);
    }
}