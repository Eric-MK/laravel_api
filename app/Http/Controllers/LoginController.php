<?php

namespace App\Http\Controllers;

use App\Models\User;
//use phpseclib3\Crypt\Hash;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],//required and must be email
            'password' => ['required']

        ]);

        $user = User::where('email', $request->email)->first();//returns the first user it finds since emails are unique and where email is equal to $request email

        if(!$user || !Hash::check($request->password, $user->password))//if theres no user found or if the $request password does not match up the user hashed password in the database
        {
            throw ValidationException::withMessages([
                'email' => ['The provided credential are incorrect'] //withMessages method is used to provide an associative array of validation error messages, where the key is the field name (in this case, email) and the value is an array of error messages.
            ]);
        }

        return $user->createToken('Auth Token')->accessToken;// creates a new personal access token for the $user model with the name 'Auth Token' and returns the plain-text value of the token.
    }
}
