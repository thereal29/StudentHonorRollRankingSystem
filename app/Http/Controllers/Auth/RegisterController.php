<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\StudentUser;
use App\Models\UserRole;
use App\Models\StudentUserMapping;
use App\Models\StudentAdvisory;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'lrn_number' => ['required', 'digits:12', 'unique:student_personal_details'],
            'gender' => ['required', 'in:Male,Female'],
            'age' => ['required', 'numeric', 'min:2'],
            'grade_level' => ['required', 'in:Grade 10,Grade 12'],
            'section' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            'home_address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'digits:11'],
            'parent_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function register(Request $request)
    {
        $input = $request->all();
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
        ]);
        $student_id = StudentUser::create([
            'firstname' => $request['firstname'],
            'middlename' => $request['middlename'],
            'lastname' => $request['lastname'],
            'lrn_number' => $request['lrn_number'],
            'gender' => $request['gender'],
            'age' => $request['age'],
            'grade_level' => $request['grade_level'],
            'section' => $request['section'],
            'birth_date' => $request['birth_date'],
            'home_address' => $request['home_address'],
            'phone_number' => $request['phone_number'],
            'parent_name' => $request['parent_name'],
        ]);
        if($student_id['grade_level'] == "Grade 10"){
            $user = User::create([
                'username' => $request['username'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'role' => 3,
        ]);}
        if($student_id['grade_level'] == "Grade 12"){
            $user = User::create([
                'username' => $request['username'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'role' => 4,
        ]);}
        StudentUserMapping::create([
            'student_id' => $student_id->id,
            'user_id' => $user->id,
        ]);
        StudentAdvisory::create([
            'student_id' => $student_id->id,
            'adviser_id' => 1,
        ]);
        if(auth()->attempt(['username'=>$input["username"], 'password'=>$input["password"]])){
            if(auth()->user()->role == 'admin'){
                return redirect()->route('admin.dashboard');
            }else if(auth()->user()->role == 'faculty'){
                return redirect()->route('adviser.dashboard');
            }else if(auth()->user()->role == 'user1'){
                return redirect()->route('grade10student.dashboard');
            }else if(auth()->user()->role == 'user2'){
                return redirect()->route('grade12student.dashboard');
            }else{
                return redirect()->route('home');
            }
        }
        else{
            return redirect()->route("login")->with("error", 'Incorrect Email or Password');
        }
        return $user;
    }
    // public function register(Request $request){
    //     $input = $request->all();
    //     $this->validate($request,[
    //         'username' => 'required',
    //         'password' => 'required',
    //     ]);
    //     if(auth()->attempt(['username'=>$input["username"], 'password'=>$input["password"]])){
    //         if(auth()->user()->role == 'admin'){
    //             return redirect()->route('home.admin');
    //         }else if(auth()->user()->role == 'faculty'){
    //             return redirect()->route('home.faculty');
    //         }else if(auth()->user()->role == 'user1'){
    //             return redirect()->route('home.user1');
    //         }else if(auth()->user()->role == 'user2'){
    //             return redirect()->route('home.user2');
    //         }else{
    //             return redirect()->route('home');
    //         }
    //     }
    //     else{
    //         return redirect()->route("login")->with("error", 'Incorrect Email or Password');
    //     }
    // }
}
