<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class userExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         return User::all();
        //  $user = User::select('Employee_ID','name','email','empDOB','empGender','empAddress','Country','State','City')->get();
        return $user;
    }
}
