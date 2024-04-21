<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class AuthController extends Controller
{
    public function login($guard)
    {
        $request = request();

        if ($guard === 'admin') {
            $request->validate([
                'cin_email' => 'required|string',
                'password' => 'required',
            ]);

            if ($admin = Admin::where('email', $request->cin_email)->first()) {
                if (!Hash::check($request->password, $admin->password)) {
                    return response(['message' => 'Le mot de passe est incorrect', 'errors' => ['password' => ['Le mot de passe est incorrect']]], 422);
                }
            } else if ($admin = Admin::where('cin', $request->cin_email)->first()) {
                if (!Hash::check($request->password, $admin->password)) {
                    return response(['message' => 'Le mot de passe est incorrect', 'errors' => ['password' => ['Le mot de passe est incorrect']]], 422);
                }
            } else {
                return response(['message' => 'Les identifiants fournis sont incorrects', 'errors' => ['cin_email' => 'Les identifiants fournis sont incorrects']], 422);
            }

            return response([
                'token' => $admin->createToken('Admin', ['admin'])->plainTextToken
            ], 200);
        } else if ($guard === 'user') {
            $request->validate([
                'cin_email' => 'required|string',
                'password' => 'required',
            ]);

            if ($user = User::where('email', $request->cin_email)->first()) {
                if (!Hash::check($request->password, $user->password)) {
                    return response(['message' => 'Le mot de passe est incorrect', 'errors' => ['password' => ['Le mot de passe est incorrect']]], 422);
                }
            } else if ($user = User::where('cin', $request->cin_email)->first()) {
                if (!Hash::check($request->password, $user->password)) {
                    return response(['message' => 'Le mot de passe est incorrect', 'errors' => ['password' => ['Le mot de passe est incorrect']]], 422);
                }
            } else {
                return response(['message' => 'Les identifiants fournis sont incorrects', 'errors' => ['cin_email' => 'Les identifiants fournis sont incorrects']], 422);
            }

            return response([
                'token' => $user->createToken('user', ['user'])->plainTextToken
            ], 200);
        }
    }

    public function forgotPassword($guard)
    {
        $request = request();

        if ($guard === 'admin') {
            $request->validate([
                'email' => 'required|email',
            ]);

            $status = Password::sendResetLink(
                $request->only('email')
            );
        } else if ($guard === 'user') {
            $request->validate([
                'email' => 'required|email',
            ]);

            $status = Password::sendResetLink(
                $request->only('email')
            );
        }

        if ($status === Password::RESET_LINK_SENT) {
            return response()->json(['message' => 'Password reset link sent']);
        } else {
            return response()->json(['message' => 'Unable to send reset link'], 500);
        }
    }


    public function newPassword(Request $request, $guard)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required|string', // The password reset token
        ]);

        $credentials = $request->only('email', 'password', 'password_confirmation', 'token');

        // Attempt to reset the user's password
        $status = Password::reset($credentials, function ($user, $password) use ($guard) {
            $user->password = bcrypt($password);
            $user->save();
        });

        // Check the reset status
        if ($status === Password::PASSWORD_RESET) {
            return response()->json(['message' => 'Password has been reset successfully']);
        } else {
            return response()->json(['message' => 'Unable to reset password'], 500);
        }
    }


    public function logout($guard)
    {
        $request = request();
        $request->user($guard)->tokens()->delete();
        return response([
            'message' => 'Déconnexion réussie'
        ], 200);
    }
}
