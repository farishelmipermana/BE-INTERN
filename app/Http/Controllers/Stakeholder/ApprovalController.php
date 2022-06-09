<?php

namespace App\Http\Controllers\Stakeholder;

use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprovalController extends Controller
{
    public function index(){
        $req = ModelsRequest::where('stakeholder_id', Auth::guard('stakeholder')->user()->id)->get();
        return view('stakeholder.approvals.index', compact('req'));
    }

    public function acc($id, Request $request){
        if($request->approval_type == 'take'){
            ModelsRequest::findOrFail($id)->update([
                'approval_take' => 1
            ]);
        }else{
            ModelsRequest::findOrFail($id)->update([
                'approval_use' => 1
            ]);
        }
        return redirect()->back()->with('success', 'Berhasil melakukan persetujuan');
    }

    public function dec($id, Request $request){
        if($request->approval_type == 'take'){
            ModelsRequest::findOrFail($id)->update([
                'approval_take' => 0
            ]);
        }else{
            ModelsRequest::findOrFail($id)->update([
                'approval_use' => 0
            ]);
        }
        return redirect()->back()->with('success', 'Berhasil melakukan tidak persetujuan');
    }
}
