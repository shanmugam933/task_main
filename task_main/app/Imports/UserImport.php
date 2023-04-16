<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

use Maatwebsite\Excel\Imports\Concerns\WithDefaultValue;

class UserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function withHeadingRow(): int
    {
        return 1; // Set the row number where the headers are located
    }

    public function withDefaultValues(): array
    {
        return [
            'Country' => 'Default Country Value' // Set a default value for Country field
        ];
    }
    public function model(array $row)
    {
        return new User([
            'Employee_ID' => $row[0],
            'name' => $row[1],
            'empDOB' => $row[2],
            'email' => $row[3],
            'password' => $row[4],
            'empGender' => $row[5],
            'empAddress' => $row[6],
            'Country' => 'India',
            'State' => 'Tamil Nadu',
            'City' => 'Sholinghur',
            'remember' => 'Sholinghur',
        ]);
    }
}
