<?php

namespace App\Models\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class userImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
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
            'Country' => $row[7],
            'State' => $row[8],
            'City' => $row[9],
        ]);
    }
}
