<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\imports\userimport;

use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function view(){
        return view('importexportview');
    }
    public function import(){
        Excel::import(new userImport, request()->file('file'));

         return redirect()->back();
    }
}
