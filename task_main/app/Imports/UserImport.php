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


        $count = NULL;

        $count = User::where('id',$row[0])->first();

            if(isset($count)) {

                User::where('id', $row[0])
                        ->update([
                            'Employee_ID' => $row[1],
                            'name' => $row[2],
                            'empDOB' => $row[3],
                            'email' => $row[4],
                            'password' => Hash::make($row[5]),
                            'empGender' => $row[6],
                            'empAddress' => $row[7],
                            'country' => $row[8],
                            'state' => $row[9],
                            'city' => $row[10],
                            'remember' => $row[11]
                        ]);
                return;

                // Number extracted from Employee_ID: 24585

            }
            else {

                return new User([
                    'Employee_ID' => $row[1],
                    'name' => $row[2],
                    'empDOB' => $row[3],
                    'email' => $row[4],
                    'password' =>  Hash::make($row[5]),
                    'empGender' => $row[6],
                    'empAddress' => $row[7],
                    'country' => $row[8],
                    'state' => $row[9],
                    'city' => $row[10],
                    'remember' => $row[11]
                ]);
        }
    }
}
