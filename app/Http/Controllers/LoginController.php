<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Login;

class LoginController extends Controller
{
    //login with username and password
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = Login::where('username', $username)->first();

        if ($user && $user->password === $password) {
            Auth::login($user);
            return redirect('/Download')->with(['success' => 'Login Successful']);
        } 
        else {
            echo "Invalid credentials";
        }
    }

    //change password 
    public function changePassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $oldpw = $request->get('oldpass');
            $newpw = $request->get('newpass');
            $cnewp = $request->get('cnewpass');

            if ($newpw == $cnewp) {
                $data = Login::where('password', $oldpw)->first();
                if (isset($data)) {
                    $data->password = $newpw;
                    $data->save();
                    return redirect('/ChangePass')->with(["success" => "Password Updated Successfully"]);
                } else {
                    return redirect('/ChangePass')->with(["error" => "Old Password does not match"]);
                }
            } else {
                return redirect('/ChangePass')->with(["error" => "New password and Confirm new password do not match"]);
            }
        }
    }

    //logout 
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return redirect('/');
    }

}
