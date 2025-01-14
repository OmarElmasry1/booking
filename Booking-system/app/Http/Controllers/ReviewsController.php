<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewsController extends Controller
{
   public function index() {

    $review = Review::paginate(10);

    return response()->json($review);
   }

   public function business_review ($id) {

    $review = Review::where('business_id', $id)->get();

    return response()->json($review);

   }

   public function store(Request $request) {

    $validator = Validator::make($request->all(), [
        'business_id'=> 'required',
        'stars'=> 'required',
        'review'=> 'required',
      ]);

    if ($validator->fails()) {
        return response()->json($validator->errors()->toJson(), 400);
    }

  
    $review = new Review();
    $review->review = $request->review;
    $review->stars = $request->stars;
    $review->business_id = $request->business_id;
    $review->user_id = Auth::id();
    $review->save();

    return response()->json('Reviews is Created');

}    

public function update(Request $request, $id) {

    $validator = Validator::make($request->all(), [
        'business_id'=> 'required',
        'stars'=> 'required',
        'review'=> 'required',
      ]);

    if ($validator->fails()) {
        return response()->json($validator->errors()->toJson(), 400);
    }

    $review = Review::findOrFail($id);
  
    $review = new Review();
    $review->review = $request->review;
    $review->stars = $request->stars;
    $review->business_id = $request->business_id;
    $review->user_id = Auth::id();
    $review->save();

    return response()->json('Reviews is updated');

}    

public function destroy($id) {

    $review = Review::findOrFail($id);

    $review->delete();

    return response()->json('reviews is Deleted');
}

}
