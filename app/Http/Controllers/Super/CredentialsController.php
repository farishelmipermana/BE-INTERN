<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Stakeholder;
use App\Models\User;
use Illuminate\Http\Request;

class CredentialsController extends Controller
{
    public function index(Request $request){
        if($request->is('*/admin*')){
            $credentials = Admin::all();
        }else{
            $credentials = Stakeholder::all();
        }
        return view('super.credentials.index', compact('credentials'));
    }

    public function adminStore(Request $request){
        $request->validate([
            'user_id'=>'required|unique:admins',
            'password'=>'required',
            'username'=>'required|unique:admins'
        ]);
        Admin::create([
            'user_id'=> $request->user_id,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);
        return redirect()->back()->with('success', 'Berhasil menambahkan data credential');
    }

    public function adminForget($id, Request $request){
        $request->validate([
            'password'=>'required',
        ]);
        Admin::findOrFail($id)->update([
            'password' => bcrypt($request->password)
        ]);
        return redirect()->back()->with('success', 'Berhasil menambahkan data credential');
    }

    public function adminDestroy($id){
        Admin::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Berhasil hapus data');
    }

    public function stakeholderIndex(){
        return view('super.credentials.stakeholder');
    }

    public function stakeholderStore(Request $request){
        $request->validate([
            'user_id'=>'required|unique:admins',
            'password'=>'required',
            'username'=>'required|unique:admins'
        ]);
        Stakeholder::create([
            'user_id'=> $request->user_id,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);
        return redirect()->back()->with('success', 'Berhasil menambahkan data credential');
    }

    public function stakeholderDestroy($id){
        Stakeholder::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Berhasil hapus data');
    }

    public function stakeholderForget($id, Request $request){
        $request->validate([
            'password'=>'required',
        ]);
        Stakeholder::findOrFail($id)->update([
            'password' => bcrypt($request->password)
        ]);
        return redirect()->back()->with('success', 'Berhasil menambahkan data credential');
    }
}
