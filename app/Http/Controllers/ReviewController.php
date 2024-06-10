<?php

namespace App\Http\Controllers;
use App\Models\Parcel; // Make sure to import the Announcement model
use Illuminate\Support\Facades\Auth;
use App\models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use Illuminate\Support\Facades\Session;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function View()
    {
        $userRatings = Review::pluck('rating')->toArray();

        // Calculate the average rating
        $averageRating = count($userRatings) > 0 ? array_sum($userRatings) / count($userRatings) : 0;
        // Calculate counts for each rating level (1 to 5)
    $ratingCounts = [
        '1' => count(array_filter($userRatings, function ($rating) { return $rating == 1; })),
        '2' => count(array_filter($userRatings, function ($rating) { return $rating == 2; })),
        '3' => count(array_filter($userRatings, function ($rating) { return $rating == 3; })),
        '4' => count(array_filter($userRatings, function ($rating) { return $rating == 4; })),
        '5' => count(array_filter($userRatings, function ($rating) { return $rating == 5; })),
    ];
        $reviewData = Review::all();
        return view('dashboard_page/user/review', ['userRatings' => $userRatings, 'averageRating' => $averageRating, 'ratingCounts' => $ratingCounts,'reviewData' => $reviewData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $info['user']=$user;
        $parcel = Parcel::where('User_id', $user->id)->where('status', '=', 'Collected')->doesntHave('reviews')->get();
        return view('dashboard_page.user.createdReview', ['parcel' => $parcel],$info);
    }

    public function store(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'comment' => 'required',
        'rating' => 'required|integer|between:1,5',
        'images' => 'mimes:jpeg,png,jpg|max:2048',
    ]);

    $parcel = Parcel::find($id);
    if (!$parcel) {
        return back()->with('error', 'Parcel not found with ID ' . $id);
    }

    $filename = '';
    if ($request->hasFile('images')) {
        $filename = $request->getSchemeAndHttpHost() . '/picture/reviews/' . time() . '.' . $request->file('images')->extension();
        $request->file('images')->move(public_path('/picture/reviews'), $filename);
    }

    $review = new Review();
    $review->name = $request->input('name');
    $review->comment = $request->input('comment');
    $review->rating = $request->input('rating');
    $review->parcel_id = $id;
    $review->images = $filename;
    $review->save();

    return redirect()->route('review.list')->with('success', 'Review created successfully');
}

    function myReview()
    {
        $user = Auth::user(); // Retrieve the currently authenticated user.

        $reviewData = Review::whereHas('parcel', function ($query) use ($user) {
        $query->where('user_id', $user->id); // Filter reviews by the user's ID.
    })->get();
        $parcel = Parcel::where('User_id', $user->id)->get();
        return view('dashboard_page.user.editReview', ['reviewData' => $reviewData],['parcel' => $parcel]);
    }
    function updateReview(Request $request, $id)
    {

        $request->validate([
            'comment' => 'required',
            'rating' => 'required|integer|between:1,5', // Adjust this validation rule based on your rating input
            'images' => 'mimes:jpeg,png,jpg|max:2048',
        ]);

    // Find the feedback record by ID
            $review = Review::find($id);
            $filename = '';
            if ($request->hasFile('images')) {
                $filename = $request->getSchemeAndHttpHost() . '/picture/reviews/' . time() . '.' . $request->file('images')->extension();
                $request->file('images')->move(public_path('/picture/reviews'), $filename);
            }
            $review->comment = $request->input('comment');
            $review->rating = $request->input('rating');
            // Update the feedback record with the edited data
            $review->images = $filename;
            $review->save();

    // Redirect back to the feedback list or show page
        return redirect()->route('edit.review')->with('success', 'Review updated successfully');
    }

    function deleted(Request $request, $id)
    {
        Review::where('id',$request->id)->delete();
        return redirect()->route('review.list')->with('success', 'Review has been deleted');
    }
}
