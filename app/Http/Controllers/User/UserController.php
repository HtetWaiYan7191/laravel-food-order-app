<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function home() {
        $pizzas = Product::orderBy('created_at', 'desc')->get();
        $categories = Category::get();
        return view('user.main.home', compact('pizzas', 'categories'));
    }

    public function changePassword() {
        return view('user.account.changePassword');
    }

    public function updatePassword(Request $request) {
        $this->validatePassword($request);
        $user = User::select('password')->where('id', Auth::user()->id)->first();
        $dbPassword = $user->password;

        if(Hash::check($request->oldPassword, $dbPassword)) {
            $data = [
                'password' => Hash::make($request->newPassword)
            ];
            User::where('id', Auth::user()->id)->update($data);
            return back()->with(['success' => 'Password changed successfully...']);
        }
        return back()->with(['fail' => 'The old password does not match ']);
    }

    private function validatePassword($request) {
        Validator::make($request->all(), [
            'oldPassword' => 'required|min:6',
            'newPassword' => 'required|min:6|same:confirmPassword',
            'confirmPassword' => 'required|min:6|same:newPassword',
        ],[])->validate();
    }
}
