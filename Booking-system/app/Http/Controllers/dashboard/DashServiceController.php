<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DashServiceController extends Controller
{
    
    public function index() {


        $services = Service::paginate(10);

        return view('service', compact('services'));

    }

    public function create() {

        return view('create_service');
    }


    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'name'=> 'required|string|max:255',
            'price'=> 'required|string',
            'description'=> 'required'
          ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $services = new Service();
        $services->name = $request->name;
        $services->price = $request->price;
        $services->description = $request->description;
        $services->save();

        return redirect()->back();

    }    


   
    public function destroy($id) {

        $service = Service::findOrFail($id);

        $service->delete();

        return redirect()->back();
}

}