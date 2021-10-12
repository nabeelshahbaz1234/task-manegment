<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    // protected function redirectTo(){
    //     dd(Auth()->user()->role==1);
    //   if (Auth()->user()->role==1){
    //       return redirect()->route('admin.dashboard');
    //   }
    //   else if(Auth()->user()==2){
    //     return redirect()->route('user.dashboard');
    //   }
    //   else if(Auth()->user()==3){
          
    //     return redirect()->route('client.dashboard');
    //   }
    //}
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
   public function login(request $request){
       $input =$request->all();
    // dd($request);
       $this->validate($request,[
       'email' => 'required|max:255|email',
        'password'=>'required |min:8 max:10'

       ]);

       if(Auth()->attempt(array('email'=>$input['email'],'password'=>$input['password']))){
           if(auth()->user()->role==1){
               return redirect()->route('admin.dashboard');
           }
           else if(auth()->user()->role==2){
            return redirect()->route('user.dashboard');
           }
           else if(auth()->user()->role==3){
            return redirect()->route('client.dashboard');
           }
        }else{
            return Redirect()->back('login')->withErrors('error','Email and password are wrong');
           // return redirect()->back()->witherrors('error','Email and password are wrong');
        }

        


       }

}
