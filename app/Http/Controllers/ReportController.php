<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request;
use App\Models\User;
use App\Models\Parcel;
use App\Models\Review;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class ReportController extends Controller
{
    function userlistReport()
    {
        $users = User::all();
        return view('dashboard_page.report.userlist', compact('users'));
    }
    function ParcelListReport()
    {
        $parcel = Parcel::all();
        return view('dashboard_page.report.ParcelList', compact('parcel'));
    }
    function ParcelCollectedListReport()
    {
        $parcel = Parcel::where('status', '=', 'Collected')->get();
        return view('dashboard_page.report.ParcelCollectedlist', ['parcel' => $parcel]);
    }
    function FeedbackListReport()
    {
        $Feedback = Feedback::All();
        return view('dashboard_page.report.Feedbacklist', compact('Feedback'));
    }
    function ReviewListReport()
    {
        $review = Review::All();
        return view('dashboard_page.report.Reviewlist', compact('review'));
    }
    function UserParcelListReport()
    {
        $user = Auth::user();
        $parcel = Parcel::where('User_id', $user->id)->get();
        return view('dashboard_page.report.ParcelList', compact('parcel'));
    }
    function UserParcelCollectedListReport()
    {
        $user = Auth::user();
        $parcel = Parcel::where('User_id', $user->id)->where('status', '=', 'Collected')->get();
        return view('dashboard_page.report.ParcelCollectedlist', ['parcel' => $parcel]);
    }
    function UserFeedbackListReport()
    {
        $user = Auth::user();
        $Feedback = Feedback::where('User_id', $user->id)->get();
        return view('dashboard_page.report.Feedbacklist', compact('Feedback'));
    }
    function UserReviewListReport()
    {
        $user = Auth::user(); // Retrieve the currently authenticated user.

        $review = Review::whereHas('parcel', function ($query) use ($user) {
        $query->where('user_id', $user->id); // Filter reviews by the user's ID.
        })->get();
        $parcel = Parcel::where('User_id', $user->id)->get();
        return view('dashboard_page.report.Reviewlist', compact('review'));

    }

}
