<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //
    public function list() {
        $admins = User::where('role', 'admin')->get();
        return view('admin.account.list', compact('admins'));
    }

    public function changePasswordPage() {
        return view('admin.account.changePassword');
    }

    public function updatePassword(Request $request) {
        $this->passwordValidation($request);
        $user = User::select('password')->where('id', Auth::user()->id)->first();
        $dbPassword = $user->password;
        if(Hash::check($request->oldPassword, $dbPassword)) {
            $data = [
                'password' => Hash::make($request->newPassword)
            ];
            User::where('id', Auth::user()->id)->update($data);
            return back()->with(['success' => 'Password Changed successfully']);
           
        }
        return back()->with(['fail' => 'The old password does not match']);
    }

    //redirect to admin account detail page 

    public function detail() {
        return view('admin.account.detail');
    }

    public function edit() {
        return view('admin.account.edit');
    }

    public function update(Request $request, $id) {
        $this->createValidation($request);
        $data = $this->getData($request);

        if($request->hasFile('image')) {
            $user = User::where('id', $id)->first();
            $dbImage = $user->image;

            if($dbImage != null) {
                Storage::delete('public/'.$dbImage);
            }

            $fileName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $fileName);
            $data['image'] = $fileName;
        }
        
        User::where('id', $id)->update($data);
        return redirect()->route('admin#detail')->with(['success' => 'Account updated successfully']);
    }




    private function passwordValidation($request) {
        Validator::make($request->all(), [
            'oldPassword' => 'required|min:6',
            'newPassword' => 'required|min:6|same:confirmPassword',
            'confirmPassword' => 'required|min:6|same:newPassword',
        ],[
            'oldPassword.required' => 'Need to be Filled ',
            'newPassword.required' => 'Need to be Filled ',
            'confirmPassword.required' => 'Need to be Filled ',
        ])->validate();
    }

    private function createValidation($request) {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'image' => 'mimes:png,jpg,jpeg,web,webp|file',
            'gender' => 'nullable|string',
            'phone' => 'numeric|min:9|nullable',
            'address' => 'nullable|string',
        ],
        [

        ])->validate();
    }

    private function getData($request) {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'updated_at' => Carbon::now(),
        ];
    }
}
