<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Parcel;
use App\Models\Feedback;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\APP;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
class PdfController extends Controller
{
    function generatePDF()
    {
        $data = User::all();
        view()->share('users', $data);
        $pdf = Pdf::loadView('dashboard_page.report.PDF.staff.listofuser', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('list of user.pdf');
    }
    function generateParcelPDF(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        // Fetch data based on date range
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $userRole = auth()->user()->role; // Assuming you have a 'role' field in your user model
        if ($userRole == 'user') {
            $userId = auth()->user()->id;
            $data = Parcel::where('user_id', $userId)
                ->whereBetween('date_received', [$start_date, $end_date])
                ->get();
        } else {
            // For other roles, fetch data without user filtering
            $data = Parcel::whereBetween('date_received', [$start_date, $end_date])
                ->get();
        }

        view()->share('parcel', $data);

        $pdf = PDF::loadView('dashboard_page.report.PDF.staff.listofparcel', compact('data'))->setPaper('a4', 'landscape');

        return $pdf->download('list of Parcel.pdf');
    }
    function generateParcelCollectedPDF(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        // Fetch data based on date range
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $userRole = auth()->user()->role; // Assuming you have a 'role' field in your user model
        if ($userRole == 'user') {
            $userId = auth()->user()->id;
            $data = Parcel::where('user_id', $userId)->where('status', '=', 'Collected')
                ->whereBetween('date_received', [$start_date, $end_date])
                ->get();
        } else {
        $data = Parcel::whereBetween('date_received', [$start_date, $end_date])->where('status', '=', 'Collected')->get();
        }
        view()->share('parcel', $data);
        $pdf = Pdf::loadView('dashboard_page.report.PDF.staff.listofparcelcollected', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('list of Parcel Collected.pdf');
    }
    function generateFeedbackPDF(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        // Fetch data based on date range
        $start_date = Carbon::parse($request->input('start_date'))->startOfDay();
        $end_date = Carbon::parse($request->input('end_date'))->endOfDay();
        $userRole = auth()->user()->role; // Assuming you have a 'role' field in your user model
        if ($userRole == 'user') {
            $userId = auth()->user()->id;
            $data = Feedback::where('user_id', $userId)
                ->whereBetween('created_at', [$start_date, $end_date])
                ->get();
        } else {
            $data = Feedback::whereBetween('created_at', [$start_date, $end_date])->get();
        }
        view()->share('Feedback', $data);
        $pdf = Pdf::loadView('dashboard_page.report.PDF.staff.listoffeedback', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('list of Feedback.pdf');
    }
    function generateReviewPDF(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $start_date = Carbon::parse($request->input('start_date'))->startOfDay();
        $end_date = Carbon::parse($request->input('end_date'))->endOfDay();
        $user = auth()->user();

        $review = Review::whereHas('parcel', function ($query) use ($user, $start_date, $end_date) {
            $query->where('user_id', $user->id)
                ->whereBetween('created_at', [$start_date, $end_date]);
        });

        if ($user->role === 'user') {
            $data = $review->get();
        } else {
            // If the role is not 'user', fetch all reviews within the date range
            $data = Review::whereBetween('created_at', [$start_date, $end_date])->get();
        }

        view()->share('review', $data);

        $pdf = PDF::loadView('dashboard_page.report.PDF.staff.listofreview', compact('data'))->setPaper('a4', 'landscape');

        return $pdf->download('list of Review.pdf');
    }
}
