<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $errors = new MessageBag; // initiate MessageBag
        $input = $request->all();
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required|min:8',
        ]);
        if(auth()->attempt(['username'=>$input["username"], 'password'=>$input["password"]])){
            if(auth()->user()->role == 'admin'){
                return redirect()->route('admin.dashboard')->with('alert-success', 'You are now logged in.');
            }else if(auth()->user()->role == 'faculty'){
                return redirect()->route('adviser.dashboard')->with('alert-success', 'You are now logged in.');
            }else if(auth()->user()->role == 'user1'){
                return redirect()->route('grade10student.dashboard')->with('alert-success', 'You are now logged in.');
            }else if(auth()->user()->role == 'user2'){
                return redirect()->route('grade12student.dashboard')->with('alert-success', 'You are now logged in.');
            }else{
                return redirect()->route('home');
            }
        }
        else{
            $errors = new MessageBag(['password' => ['Incorrect Username and/or Password.']]);
            return Redirect::back()->withErrors($errors)->withInput($request->only('username','remember'));
        }
    }

    // public function username(){
    //     # get the input value
    //     $loginValue = request('username');
    //     # check if it is either an email or username
    //     $this->username = filter_var($loginValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    //     #merge values
    //     request()->merge([$this->username => $loginValue]);
    //     #return login type
    //     return property_exists($this, 'username') ? $this->username : 'email';
    // }

}
