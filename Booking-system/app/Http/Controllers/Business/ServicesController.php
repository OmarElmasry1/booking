<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Service;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
    public function index() {
        $service = Service::paginate(10);

        return response()->json($service);

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

        return response()->json('Services is Created');

    }    


    public function update(Request $request, $id) {
        $service = Service::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name'=> 'required|string|max:255',
            'price'=> 'required|string',
            'description'=> 'required'
          ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $service->name = $request->name;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->save();

        return response()->json('Services is Updated');

    }

    public function destroy($id) {

        $service = Service::findOrFail($id);

        $service->delete();

        return response()->js0n('Services is Deleted');
    }
}
