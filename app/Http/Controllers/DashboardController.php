<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\UsersModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class DashboardController extends Controller
{
    public function index()
    {
        $users = UsersModel::all();

        // return response()->json([
        //     'success' => true,
        //     'data' => $users
        // ]);
        return view('admin.dash', compact('users'));
    }

    public function create_user(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', 'unique:users'],
                'employee_id' => ['required', 'regex:/[A-Z]{2}-\d{4}/', 'unique:users'],
            ]);


            if ($validator->fails()) {
                return redirect()->route('admin.dash')->withErrors($validator);
            }
    
            $hire_employee = UsersModel::create([
              'name' => $request->input('name'),
              'email' => $request->input('email'),
              'employee_id' => $request->input('employee_id'),
            ]);
    
            if ($hire_employee) {
                return redirect()->route('admin.dash')->with('employee_hired', $request->input('name'). ' was successfully hired into the system!');
            } else {
                return redirect()->route('admin.dash')->with('emp_hire_err', 'Something went wrong hiring employee in the system');
            }
        }
    }
    
  

    public function update_user(Request $request, $id)
    {
        $user = UsersModel::findOrFail($id);
    
        if ($request->isMethod('put')) {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
                'employee_id' => ['required', 'regex:/[A-Z]{2}-\d{4}/', Rule::unique('users')->ignore($user->id)],
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }
            else{
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->employee_id = $request->input('employee_id');
                $user->save(); // Update Employee Info 
                return redirect()->route('admin.user.edit', ['id' => $user->id])->with('user_updated', 'Employee information saved!');
            }
        }
    
        return view('admin.user.edit', compact('user'));
    }
    

    public function delete_user(Request $request, $id)
    {   
        if($request->isMethod('delete')){
        $user = UsersModel::findOrFail($id);
        $delete = $user->delete();
        if($delete){
            return redirect()->back()->with('emp_deleted', $user->name . ' was successfully deleted from the system');
        }
        else{
            return redirect()->back()->with('emp_delete_err', 'Something went wrong deleting '.$user->name. ' from the system');
        }
    }
}

 
}