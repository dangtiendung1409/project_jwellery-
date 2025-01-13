<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class reviewController extends Controller
{
    public function reviews(){
        $reviews = Review::with(['product.images'])->paginate(10);
        return view('admin.Review.listReview', compact('reviews'));
    }

    public function updateReviewStatus($id, $status) {
        $review = Review::findOrFail($id);
        $review->status = $status;
        $review->save();

        Session::flash('successMessage', 'Update status successfully!');
        return redirect()->route('admin.reviews')->with('success', 'Review status updated successfully');
    }
}
