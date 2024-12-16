<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function register(Request $request){
        $data=$request->validate([
           'name'=>'required',
           'email'=>'required|email', 
           'password'=>'required|confirmed', 
        ]);
        $user=User::create($data);

        if($user){
            return redirect()->route('login');
        }
    }
    
    public function login(Request $request){
        $credentials=$request->validate([
            'email'=>'required|email', 
            'password'=>'required', 
         ]);
    
         if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
         }
    
    }
    
    // it checks the user is login or not
    public function dashboardPage(){
        if(Auth::check()){
            return view('dashboard');
        }
        else{
            return redirect()->route('login');
        }
    }


    public function innerPage(){
        if(Auth::check()){
            return view('inner');
        }
        else{
            return redirect()->route('login');
        }
    }

    public function logout(){
     Auth::logout();
     return redirect('/login');
    }

    public function delete(string $id){

        $user=User::find($id);
        $user->delete();    
        Auth::logout();
        return redirect()->route('login');

    }

}

