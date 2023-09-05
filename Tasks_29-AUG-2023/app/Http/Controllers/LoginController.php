<?php

namespace App\Http\Controllers;

use App\Models\Login;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $email = $request->input('email'); //$request->email
        $password = $request->input('password');
        $user = Login::where('email', $email)->first();
        // dd($email);
        if ($user) {
            if ($password == $user->password) {

                return redirect('Pages.welcome');
            }
            else{
                return redirect('Pages.Invalid');
            }
        }
        else{
            return redirect('Pages.Invalid');
        }
    }
}
