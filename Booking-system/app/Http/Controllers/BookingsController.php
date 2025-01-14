<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingsController extends Controller
{
    public function index() {

        $booking = Booking::where('user_id', Auth::id())->with('service')->paginate(10);

        return response()->json($booking);

    }


    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'service_id'=> 'required',
            'time'=> 'required',

          ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

      
        $booking = new Booking();
        $booking->time = $request->time;
        $booking->service_id = $request->service_id;
        $booking->user_id = Auth::id();
        $booking->save();

        return response()->json('Services is Created');

    }    

    public function destroy($id) {

        $booking = Booking::findOrFail($id);

        $booking->delete();

        return response()->js0n('bookings is Deleted');
    }
}
