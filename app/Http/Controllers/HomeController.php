<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function changermdp(){
        return view('changermdp');
    }
    public function reset(Request $request){
     $request->validate([
         'password' => 'required|min:8|same:password2',

     ]);
     $user=User::find(auth()->user()->id);
     $user->password=bcrypt($request->password);
     $user->save();
    return redirect('/home')->with('success','Votre mot de passe à été changé avec succès');
    }
}
