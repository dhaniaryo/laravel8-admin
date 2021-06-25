<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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
    //protected $redirectTo = RouteServiceProvider::HOME;
        
    public function redirectTo()
    {
        // Memanggil role dan statususer pada data yang akan login.
        $isadmin=Auth::user()->is_admin;
        $statususer=Auth::user()->statususer;
        if($statususer == "aktif")
        {
            // jika statususer == aktif maka masuk kesini, kemudian dikembalikan ke halaman admin atau user
            switch($isadmin){
                case 'yes';
                    return '/admindashboard';
                break;
                case 'no';
                    return '/userdashboard';
                break;
            };
        }
        else
        {
            return'/';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // //login
    // public function login(Request $request){
    //     $input = $request->all();

    //     $this->validate($request,[
    //         'email'=> 'required|email',
    //         'password'=>'required',
    //     ]);

    //     if(auth()->attempt(array('email'=>$input['email'], 'password'=>$input['password']))){
    //         if(auth()->user()->is_admin == 1){
    //             return redirect()->route('admin.home');
    //         }else{
    //             return redirect()->route('home');
    //         }
    //     }else{
    //         return redirect()->route('login')->with('error','Access Denied!');
    //     }
    // }
}
