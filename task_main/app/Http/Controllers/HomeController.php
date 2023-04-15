<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\UserImport;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function view(){
        return view('importexportview');
    }

    public function import(){

        Excel::Import(new UserImport, request()->file('file'));

         return redirect()->back();
    }
    public function export(){

        // Excel::Import(new UserImport, request()->file('file'));

         return Excel::download(new UsersExport, 'users.xlsx');
    }
}
