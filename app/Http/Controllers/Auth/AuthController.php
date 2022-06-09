<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('auth.index');
    }

    public function superLogin(Request $request){
        if(Auth::guard('super')->attempt($request->only('username', 'password'))){
            return redirect()->route('super.dashboard.index')->with('success', 'Login berhasil');
        }else{
            return redirect()->back()->with('danger', 'Password atau username salah')->withInput();
        }
    }

    public function superLogout(){
        Auth::guard('super')->logout();
        return redirect()->route('auth.super.index')->with('success', 'Logout berhasil');
    }


    public function adminLogin(Request $request){
        if(Auth::guard('admin')->attempt($request->only('username', 'password'))){
            return redirect()->route('admin.dashboard.index')->with('success', 'Login berhasil');
        }else{
            return redirect()->back()->with('danger', 'Password atau username salah')->withInput();
        }
    }

    public function adminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('auth.admin.index')->with('success', 'Logout berhasil');
    }



    public function stakeLogin(Request $request){
        if(Auth::guard('stakeholder')->attempt($request->only('username', 'password'))){
            return redirect()->route('stakeholder.dashboard.index')->with('success', 'Login berhasil');
        }else{
            return redirect()->back()->with('danger', 'Password atau username salah')->withInput();
        }
    }

    public function stakeLogout(){
        Auth::guard('stakeholder')->logout();
        return redirect()->route('auth.stakeholder.index')->with('success', 'Logout berhasil');
    }
    
}
