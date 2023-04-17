<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Imports\UserImport;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\Importable;

use App\Models\User;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Exception as PhpOfficeException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    public function view(){
        return view('importexportview');
    }

    public function import(Request $request){

        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        $file = $request->file('file');

        try {
            Excel::import(new UserImport, $file);

            return redirect()->back()->with('success', 'Users imported successfully.');

        } catch (\Exception $e) {

            if (strpos($e->getMessage(), 'Duplicate entry') !== false) {

            // Extract the duplicate email from the error message
                preg_match("/for key 'users_email_unique'.+values \(([^)]+)/", $e->getMessage(), $matches);
                $duplicateEmail = $matches[1];
                $employees  =   User::all();
                // Return the duplicate email as the error message
                $errorMsg = "Error: Duplicate entry for email: " . $duplicateEmail;
                return view('showerror',['errorMsg' => $errorMsg]);

            } else {
                return "Error: " . $e->getMessage();
            }

        }
    }

    function index()
    {
        return view('show', compact('data'));
    }
    public function importData(Request $request)
    {
        // Validate the uploaded file
        $this->validate($request, [
            'uploaded_file' => 'required|file|mimes:xls,xlsx'
        ]);

        try {
            // Load the Excel file
            $the_file = $request->file('uploaded_file');
            $spreadsheet = IOFactory::load($the_file->getRealPath());
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();
            $startcount = 1; // Starting row count in the Excel sheet

            $data = [];

            // Loop through the rows and build the data array
            foreach ($rows as $row) {
                if ($startcount == 1) {
                    // Skip the first row (header row)
                    $startcount++;
                    continue;
                }
                $data[] = [
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
                ];
                $startcount++;
            }

            // Insert data into the database
            DB::table('users')->insert($data);

            return back()->withSuccess('Great! Data has been successfully uploaded.');
        } catch (PhpOfficeException $e) {
            $error_code = $e->errorInfo[1];
            // Handle exception and show appropriate error message
            return back()->withErrors('There was a problem uploading the data!');
        } catch (ValidationException $e) {
            // Handle validation exception and show appropriate error message
            return back()->withErrors($e->validator);
        }
    }




    public function export(){
        //  Excel::Import(new UserImport, request()->file('file'));
         return Excel::download(new UserExport, 'users.xlsx');
    }
}
