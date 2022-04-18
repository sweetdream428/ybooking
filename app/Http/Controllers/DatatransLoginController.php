<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;


class DatatransLoginController extends Controller
{

    public function index()
    {
        return view('auth.datatranslogin');
    }  
      

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        dd($request->email);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials) && (Auth::user()->is_superuser != '3' && Auth::user()->is_superuser != '4')) {
            return redirect()->intended('getevents')
                        ->withSuccess('Signed in');
        }
        else if(Auth::attempt($credentials) && (Auth::user()->is_superuser == '3' || Auth::user()->is_superuser == '4')) {
            return redirect()->intended('home')->withSuccess('Signed in');
        }
        else{
            return redirect("login")->with('message', 'Login details are not valid');
        }
    }



    public function registration()
    {
        return view('auth.datatransregister');
    }
      

    public function customRegistration(Request $request)
    {  
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required|min:6',
            ]);
            
            $data = $request->all();
            $check = $this->create($data);
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return redirect()->intended('home')->with('message', 'You have Signed');
            }
            
        }
        catch (Exception $e){ 
            return back()->with('message', 'Already a registered user.');
        }
    }


    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
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