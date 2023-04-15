<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Imports\UserImport;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;



use Illuminate\Support\Facades\DB;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Reader\Exception;

use PhpOffice\PhpSpreadsheet\Writer\Xls;

use PhpOffice\PhpSpreadsheet\IOFactory;

class HomeController extends Controller
{
    public function view(){
        return view('importexportview');
    }

    public function import(){

        Excel::Import(new UserImport, request()->file('file'));

         return redirect()->back();
    }

    function index()

    {
 
       
 
        return view('show', compact('data'));
 
    }


    function importData(Request $request){

        // $data = DB::table('users')->orderBy('id', 'DESC')->paginate(5);


        $this->validate($request, [
 
            'uploaded_file' => 'required|file|mimes:xls,xlsx'
 
        ]);
 
 
 
 
        $the_file = $request->file('uploaded_file');
 
        try{
 
            $spreadsheet = IOFactory::load($the_file->getRealPath());
 
            $sheet        = $spreadsheet->getActiveSheet();
 
            $row_limit    = $sheet->getHighestDataRow();
 
            $column_limit = $sheet->getHighestDataColumn();
 
            $row_range    = range( 2, $row_limit );
 
            $column_range = range( 'F', $column_limit );
 
            $startcount = 2;
 
 
 
 
            $data = array();
 
 
 
 
            foreach ( $row_range as $row ) {
 
                $data[] = [
 
                    'Employee_ID' =>$sheet->getCell( 'A' . $row )->getValue(),
 
                    'name' => $sheet->getCell( 'B' . $row )->getValue(),
 
                    'empDOB' => $sheet->getCell( 'C' . $row )->getValue(),
 
                    'email' => $sheet->getCell( 'D' . $row )->getValue(),
 
                    'password' => $sheet->getCell( 'E' . $row )->getValue(),
 
                    'empGender' =>$sheet->getCell( 'F' . $row )->getValue(),

                    'empAddress' =>$sheet->getCell( 'G' . $row )->getValue(),
 
                    'Country' =>$sheet->getCell( 'H' . $row )->getValue(),
 
                    'State' =>$sheet->getCell( 'I' . $row )->getValue(),

                    'City' =>$sheet->getCell( 'J' . $row )->getValue(),
                ];
 
                $startcount++;
 
            }
 
 
 
 
            DB::table('users')->insert($data);
 
        } catch (Exception $e) {
 
            $error_code = $e->errorInfo[1];
 
            // echo $error_code;
 
 
            return back()->withErrors('There was a problem uploading the data!');
 
        }
 
        // return back()->withSuccess('Great! Data has been successfully uploaded.');
 
 
 
 
    }
 
 
 

    public function export(){
        //  Excel::Import(new UserImport, request()->file('file'));
         return Excel::download(new UserExport, 'users.xlsx');
    }
}
