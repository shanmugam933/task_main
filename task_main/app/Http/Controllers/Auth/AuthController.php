<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Session;
use App\Models\User;
use App\Models\Countries;
use Hash;
use DB;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */






     public function getCountries()
     {
         $countries = DB::table('countries')->get();

         // Check if the collection is empty or null
         if ($countries->isEmpty()) {
             // Handle the case when no countries are found
             // For example, return an error message or an empty array
             return 'No countries found';
         }

         return $countries;
     }

    public function registration()
    {
        $countries = $this->getCountries();
        return view('auth.registration', ['countries' => $countries]);
    }

    public function registration_update()
    {
        $countries = $this->getCountries();
        return view('update', ['countries' => $countries]);
    }


    public function getCountries_drop(){
        $countries = DB::table('countries')->get();

        return $countries;
    }



    public function getStates(Request $request){
        $states = DB::table('states')->where('country_id',$request->country_id)->get();

        if(count($states)>0){
            return response()->json($states);
        }
    }
    public function getCities(Request $request){
        $cities = DB::table('cities')->where('state_id',$request->state_id)->get();

        if(count($cities)>0){
            return response()->json($cities);
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('show')
                        ->withSuccess('You have Successfully logged In');
        }

            return redirect('login')->with('failed','Oppes! You have entered invalid credentials');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        $request->validate([
                'Employee_ID' => 'required',

                'name' => 'required',

                'empDOB' => 'required',

                'email' => 'required|email|unique:users',

                'password' => 'required|min:6',

                'empGender' => 'required',

                'empAddress' => 'required',

                'country' => 'required',

                'state' => 'required',

                'city' => 'required',

                'remember' => 'required',
        ]);


        $selectCountry = DB::table('countries')
        ->where('id', $request->input("country"))
        ->get()
        ->first();

        $selectState = DB::table('states')
                ->where('id', $request->input("state"))
                ->get()
                ->first();
        $selectCity   = DB::table('cities')
                ->where('id', $request->input("city"))
                ->get()
                ->first();

        $data = $request->all();

        $data['country'] = $selectCountry->name;
        $data['state'] = $selectState->name;
        $data['city'] = $selectCity->name;

        $check = $this->create($data);


        return redirect("show")->withSuccess('Great! You have Successfully logged In');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'Employee_ID' => "SIPL".$data['Employee_ID'],
        'name' => $data['name'],
        'empDOB' => $data['empDOB'],
        'email' => $data['email'],
        'empGender' => $data['empGender'],
        'empAddress' => $data['empAddress'],
        'country' => $data['country'],
        'state' => $data['state'],
        'city' => $data['city'],
        'password' => $data['password'],
        'remember' => $data['remember']
      ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function show(){
        $employees  =   User::all();
        return view('show',['employees'=>$employees]);
    }
    public function udpate_drop(){
        $employees  =   Countries::all();
        return view('update',['countires'=>$countires]);
    }

    public function edit($id){


        $employeess = User::find($id);

        if ($employeess === null) {
            // Handle the case when user is not found
            // For example, return an error message or redirect to an error page
            return redirect()->back()->with('error', 'User not found');
        }

        $countries = $this->getCountries();

        return view('update', ['employee' => $employeess,'countries' => $countries]);
    }


    public function update(Request $request,$id){

        $selectCountry = DB::table('countries')
        ->where('id', $request->input("country"))
        ->get()
        ->first();

        $selectState = DB::table('states')
                ->where('id', $request->input("state"))
                ->get()
                ->first();
        $selectCity   = DB::table('cities')
                ->where('id', $request->input("city"))
                ->get()
                ->first();

        $employee = User::find($id);
        $employee->name = $request->input('Employee_ID');
        $employee->name = $request->input('name');
        $employee->empDOB = $request->input('empDOB');
        $employee->email = $request->input('email');
        $employee->empGender = $request->input('empGender');
        $employee->password = $request->input('password');
        $employee->empAddress = $request->input('empAddress');
        $employee->country = $selectCountry->name;
        $employee->state = $selectState->name;
        $employee->city = $selectCity->name;
        $employee->save();
         return 'User Updated Successfully <a href="' . route('show') . '">Click here to see</a>';
    }
    public function delete($id){

        $User = User::find($id);
        $User->delete();
    

    }
    public function logout() {

        Session::flush();
        Auth::logout();
        return Redirect('login');

    }
}
