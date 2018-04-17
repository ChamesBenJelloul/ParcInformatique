<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Personnel;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
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
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function showRegistrationForm()
    {
        $personnels=Personnel::orderBy('nom')->get();
        return view('utilisateurs.ajout')->with('personnels',$personnels);
    }
    public function register(Request $request)
    {
        $personnel=Personnel::find($request->personnel);
        $username=$personnel->nom."_".$personnel->prenom;
        $password=str_random(8);
        for($i=1;$i<7;$i++)
        {
            $droit=$request->{"droit".$i};
            echo $droit;
        }

     return $request;
    }

}
