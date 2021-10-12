<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Lib\Helpers;


use Illuminate\Http\Request;

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
        $this->middleware('guest')->except('logout');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255','unique:users',],
            'password' => ['required', 'string', 'min:8', 'max:10',''],
            'confirmed_password' => ['required', 'string', 'min:8', 'max:10',''],
            'role' => ['required']
        ]);
    }
    protected function create(array $data)
    {
        //  dd($data);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role'=>$data['role'],
            'password' => Hash::make($data['password']),
            'confirmed_password' => Hash::make($data['confirmed_password'])
        ]);
    }
//   function register(Request $request){
//               $request->validate([
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
//         ]);
//   }

        /** Make avata */

//         $path = 'users/images/';
//         $fontPath = public_path('fonts/Oliciy.ttf');
//         $char = strtoupper($request->name[0]);
//         $newAvatarName = rand(12,34353).time().'_avatar.png';
//         $dest = $path.$newAvatarName;

//         // $help = new Helpers();
//         $createAvatar = $this->getmakeAvatar($fontPath, $dest, $char);
//         $picture = $createAvatar == true ? $newAvatarName : '';

//         $user = new User();
//         $user->name = $request->name;
//         $user->email = $request->email;
//         $user->role = 2;
//         $user->picture = $picture;
//         $user->password = \Hash::make($request->password);

//         if( $user->save() ){

//            return redirect()->back()->with('success','You are now successfully registerd');
//         }else{
//             return redirect()->back()->with('error','Failed to register');
//         }

//    }

    // public function getmakeAvatar($fontPath, $dest, $char){
    //     if(!function_exists('makeAvatar')){

    //         $path = $dest;
    //         $image = imagecreate(200,200);
    //         $red = rand(0,255);
    //         $green = rand(0,255);
    //         $blue = rand(0,255);
    //         imagecolorallocate($image,$red,$green,$blue);
    //         $textcolor = imagecolorallocate($image,255,255,255);
    //         imagettftext($image,100,0,50,150,$textcolor,$fontPath,$char);
    //         imagepng($image,$path);
    //         imagedestroy($image);
    //         return $path;
    //     }
    // }


}
