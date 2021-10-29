<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ClientAuthController extends Controller
{

    public function __construct() {
        $this->middleware('guest')->only(['registration']);
    }

    public function index()
    {
        return view('auth.login');
    }


    public function clientLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')
                        ->withSuccess('Vous êtes connecté(e).');
        }

        return redirect("login")->withErrors(['Vos informations ne sont pas valides']);
    }



    public function registration()
    {
        return view('auth.registration');
    }


    public function clientRegistration(Request $request)
    {
        $request->validate([
            'pseudo' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|string|min:8|max:15|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,15}$/',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("home")->withSuccess('You have signed-in');
    }


    public function create(array $data)
    {
      return User::create([
        'pseudo' => $data['pseudo'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }


    public function dashboard()
    {
        if(Auth::check()){
            return view('home');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }


    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}