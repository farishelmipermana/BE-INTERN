<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Approval;
use App\Models\Request as ModelsRequest;
use App\Models\Stakeholder;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function super(){
        $user = User::count();
        $admin = Admin::count();
        $stakeholder = Stakeholder::count();
        $vehicle = Vehicle::count();
        return view('super.dashboard.index', compact('user', 'admin', 'stakeholder', 'vehicle'));
    }    

    public function admin(){
        $approval = ModelsRequest::count();
        return view('admin.dashboard.index', compact('approval'));
    }    

    public function stakeholder(){
        $approval = ModelsRequest::where('stakeholder_id', Auth::guard('stakeholder')->user()->id)->count();
        return view('stakeholder.dashboard.index', compact('approval'));
        
    }
}
