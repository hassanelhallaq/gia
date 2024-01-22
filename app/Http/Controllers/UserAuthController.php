<?php



namespace App\Http\Controllers;



use App\Models\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserAuthController extends Controller

{
    public function showLogin($guard)
    {
        return response()->view('dashboard.auth.login', ['guard' => $guard]);
    }


    public function login(Request $request)

    {

        $validator = Validator($request->all(), [
            'email' => 'required|email|string',
            'password' => 'required|string|min:6',
            'remember_me' => 'required|boolean',
            'guard' => 'required|string|in:admin,client,trainer'
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Please enter the correct e-mail',
            'password.required' => 'Password is required',
            'guard.in' => 'Enter the correct user'
        ]);
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];
        if (!$validator->fails()) {
            if (Auth::guard($request->get('guard'))->attempt($credentials, $request->get('remember_me'))) {
                return response()->json(['icon' => 'success', 'title' => 'Login Successfully'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'Login Faild'], 400);
            }
        } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
    }
    public function logout(Request $request)
    {
        // Auth::guard()->logout();
        // $request->session()->invalidate();
        // return redirect()->route('dashboard.login', 'admin');

        $guard = auth('admin')->check() ? 'admin' : 'client';
        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        return redirect()->route('dashboard.login' , $guard);
    }
    public function editPassword()
    {
        return response()->view('dashboard.auth.edit-password');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator($request->all(), [
            'current_password' => 'required|string',
            'new_password' => 'required|string|confirmed',
            'new_password_confirmation' => 'required|string'
        ]);
        if (!$validator->fails()) {
            $admin = Admin::findOrFail(Auth()->guard('admin')->user()->id);
            $admin->password = Hash::make($request->get('new_password'));
            $isSaved = $admin->save();
            return response()->json(['icon' => 'success', 'title' => 'Password update successfully'], $isSaved ? 200 : 400);
        } else {
            return response()->json(['icon' => 'error', 'title' => 'Password update faild'], 400);
        }
    }


}
