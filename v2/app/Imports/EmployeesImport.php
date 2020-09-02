<?php

namespace App\Imports;

use App\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class EmployeesImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure
{

    use Importable, SkipsErrors, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $api_token = session()->get('api_token');
        $source_name = "B2B";
        $response = Http::withHeaders(['Authorization' => "Bearer ".$api_token])
            ->post('https://api.gettruehelp.com/api/register-students', [
            'co_relation' => $row['co_relation'],
            'parent_email' => $row['parent_email'],
            'parent_mobile' => $row['parent_mobile'],
            'parent_first_name' => $row['parent_first_name'],
            'parent_middle_name' => $row['parent_middle_name'],
            'parent_last_name' => $row['parent_last_name'],
            'parent_dob' =>  $row['parent_dob'],
            'parent_gender' =>  $row['parent_gender'],
            'email' => $row['email'],
            'mobile' => $row['mobile'],
            'first_name' =>$row['first_name'],
            'middle_name' => $row['middle_name'],
            'last_name' => $row['last_name'],
            'student_code' => $row['student_code'],
            'dob' => $row['dob'],
            'gender' => $row['gender'],
            'source_name' =>$source_name,
            'employee_types_id' => $row['employee_types_id']
        ]);
    }

    public function rules(): array
    {
        return [
            '*.email' => ['email']
        ];
    }

}