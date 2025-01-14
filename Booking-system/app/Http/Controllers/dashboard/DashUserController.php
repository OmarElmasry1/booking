<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DashUserController extends Controller
{
    public function index() {

        $users = User::paginate(10);

        $adminUser = User::where('role', 'admin')->paginate(5);

        return view('user', compact('users', 'adminUser'));
    }

    public function create () {

        return view('create_user');
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

        return redirect()->back();
    }




    public function destroy($id){

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back();

    }
}
