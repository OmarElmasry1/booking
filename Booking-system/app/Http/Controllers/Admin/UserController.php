<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index() {

        $user = User::paginate(10);

        return response ()->json($user);
    }


    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'name'=> 'required|string|max:255',
            'email'=> 'required',
            'password'=> 'required|string',
            
          ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password' => bcrypt($request->password),
            'role'=> $request->role
        ]);

        return response()->json('User is added successfully');
    }


    public function destroy($id){

        $user = User::findOrFail($id);
        $user->delete();

        return response()->json('User is deleted successfully');

    }
}
