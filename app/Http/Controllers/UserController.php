<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function submitDetails($user_id, Request $request)
    {
        // return "ikram";
        $rules = [
            'name' => 'required|string|min:3|max:25',
            'phone' => 'required|string',
            'dob' => 'required',
            'gender' => 'required|string',
            'qualification' => 'required|string',
            'languages' => 'required',
            'address' => 'required|string',
            'photo' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'unique'    => ':attribute is already used',
        ];

        $user_details =  $this->validate($request, $rules, $customMessages);

        $user = User::find($user_id);
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->dob = $request->input('dob');
        $user->gender = $request->input('gender');
        $user->qualification = $request->input('qualification');
        $user->languages = $request->input('languages');
        $user->address = $request->input('address');
        if (isset($request->photo)) {
            $imageName = time() . '.' . $request->photo->extension();

            $upload = $request->photo->move(public_path(), $imageName);

            if (!$upload) {
                return redirect()->back()->with('err', 'Something went wrong in Uploading Image');
            }
            $user['photo'] = $imageName;
        }
        $update = $user->save();

        if (!$update) {
            return redirect()->back()->with('err', 'Something went wrong in update');
        }
        return redirect()->back()->with('message', 'User Updated successfully');
    }
}
