<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class AdminController extends Controller
{
    public function show(Request $request) {
        $pending_users = User::where('status','=','pending')->paginate(5, ['*'], 'pending_users')
            ->appends(request()->except('pending_users'));

        $approved_users = User::where('status','=','approved')->paginate(5, ['*'], 'approved_users')
            ->appends(request()->except('approved_users'));

        $rejected_users = User::where('status','=','rejected')->paginate(5, ['*'], 'rejected_users')
            ->appends(request()->except('rejected_users'));


        return view('admin.users')->with('pending_users',$pending_users)
            ->with('approved_users',$approved_users)
            ->with('rejected_users',$rejected_users);
    }

    public function logout(){
        Auth::logout();
        return view('admin.login');
    }

    public function approve($user_id,$action) {
        $user = User::find($user_id);
        $user->status = 'approved';
        $user->save();
        return redirect()->back()->with('message', 'User Approved');
    }

    public function reject($user_id,$action) {
        $user = User::find($user_id);
        $user->status = 'rejected';
        $user->save();
        return redirect()->back()->with('message', 'User Rejected');
    }

}
