<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function vehicle(Request $request)
    {
        $vehicle = Vehicle::where('name', 'LIKE', '%' . $request->input('term', '') . '%')
            ->get([
                'id as id',
                'name as text',
                ]);
        return ['results' => $vehicle];
    }

    public function stakeholder(Request $request)
    {
        $stakeholder = User::has('stakeholders')->where('name', 'LIKE', '%' . $request->input('term', '') . '%')
            ->get([
                'id as id',
                'name as text',
                ]);
        return ['results' => $stakeholder];
    }

    public function users(Request $request)
    {
        $user = User::doesntHave('admins')->doesntHave('stakeholders')->where('name', 'LIKE', '%' . $request->input('term', '') . '%')
            ->get([
                'id as id',
                'name as text',
                ]);
        return ['results' => $user];
    }

    public function usersAll(Request $request)
    {
        $user = User::where('name', 'LIKE', '%' . $request->input('term', '') . '%')
            ->get([
                'id as id',
                'name as text',
            ]);
        return ['results' => $user];
    }
}
