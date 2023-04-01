<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminModel;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            $validator = $this->validateUser($request->all());
            if($validator->fails()){

                return redirect()->back()->withErrors($validator);
            }
            else{
                if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password])){
                    session(['admin'=>Auth::guard('admin')->user()]); // creates session object with admin data 
                    return redirect('admin/dash');
                }
                else{
                    return redirect()->back()->with('AUTH_ERROR', 'Your login credentials do not match our records');
                }
            }
        }
        return view('login');
    }

    public function logout(Request $request){
        Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->invalidate();
        return redirect(url(''));
    }

    private function validateUser($data){
        return Validator::make($data, [
            'email'=>'required|email|exists:admins',
            'password'=>'required',
        ]);
    }
}