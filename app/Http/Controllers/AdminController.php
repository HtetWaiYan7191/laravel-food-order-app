<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //
    public function changePasswordPage() {
        return view('admin.account.changePassword');
    }

    public function updatePassword(Request $request) {
        $this->passwordValidation($request);
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
