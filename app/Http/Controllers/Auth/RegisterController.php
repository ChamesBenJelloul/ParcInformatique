<?php

namespace App\Http\Controllers\Auth;
use App\Droit;
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
            'personnel' => 'required|string|max:255',
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
        $finalrequest=array();
        $this->validator($request->all())->validate();
        $personnel=Personnel::find($request->personnel);
        $username=$personnel->nom."_".$personnel->prenom;
        $user=new User();
        $test=$user->where('username',$username)->first();
        if($test){$username=$username."_".$test->id;}
        $finalrequest['username']=$username;
        $finalrequest['password']=str_random(8);
        $finalrequest['id_personnel']=$request->personnel;
        for($i=1;$i<7;$i++)
        {
            $droit=$request->{"droit".$i};
            if($droit)
            {
                $finalrequest[$i]=1;
            }
            else
                {$finalrequest[$i]=0;}
        }
        $test2=$user->where('personnel_id',$request->personnel)->first();
        if($test2){return redirect(url('gerer_utilisateurs/Ajout'))->with('error','Un compte utilisateur existe déjà pour cette personne');}
     return view('utilisateurs.finalajout')->with('finalrequest',$finalrequest);
    }
    public function finalregister(Request $request)
    {
        $user=new User();
        $user->username=$request->username;
        $user->password=bcrypt($request->password);
        $user->personnel()->associate($request->id_personnel);
        $user->save();
        $droit=new Droit();
        for($i=1;$i<7;$i++)
        {
            if($request->{"droit".$i}){
                $droitx=$droit->where('id',$i)->first();
                $user->droits()->attach($droitx);
            }
        }
        return redirect(url('gerer_utilisateurs/Ajout'))->with('success','Ajout effectué avec succés');
    }

}
