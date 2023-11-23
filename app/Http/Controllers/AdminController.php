<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //
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
}
