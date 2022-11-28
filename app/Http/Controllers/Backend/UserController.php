<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_view()
    {
        $allData = User::where('usertype', 'Admin')->get();
        return view('backend.user.user_view', compact('allData'));
    }

    public function user_add()
    {
        return view('backend.user.user_add');
    }

    public function user_store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
        ]);

        $data = new User();
        $code = rand(0000,9999);
        $data->usertype = 'Admin';
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($code);
        $data->code = $code; 
        $data->save();

        $notifcation = array(
            'message' => 'User Created Succefully',
            'alert-type' => 'success'
        ); 

        return redirect()->route('users.view')->with($notifcation);
    }

    public function user_edit($id){
        $editData = User::find($id);
        return view('backend.user.user_edit', compact('editData'));
    }

    public function user_update(Request $request, $id){
        $data = User::find($id);
    	$data->name = $request->name;
    	$data->email = $request->email;
    	$data->role = $request->role;
    	$data->save();

    	$notification = array(
    		'message' => 'User Updated Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('users.view')->with($notification);
    }

    public function user_delete($id){
    	$user = User::find($id);
    	$user->delete();

    	$notification = array(
    		'message' => 'User Deleted Successfully',
    		'alert-type' => 'info'
    	);
    	return redirect()->route('users.view')->with($notification);
    }
}
