<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function index ()
    {
        return view('access/user/index');
    }
    function edit_profile()
    {
        if (Auth::check()) {

            $user = Auth::user();
            $data['user']=$user;
            return view('dashboard_page.user.userprofile',$data);

        } else {
            return "Please log in to access this page.";

        }
    }
    function update_profile(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'gender' => 'required|in:Male,Female', // Replace with your allowed gender values
            'room_number' => 'required|min:3|regex:/^[a-zA-Z0-9-]+$/', // Validates uniqueness in 'users' table
            'phone_number' => 'required|regex:/^[0-9]{10,}$/|unique:users', // Assumes a 10-digit phone number
        ], [
            'name.required' => 'Full Name Must Be Filled In',
            'name.min' => 'Full Name Must Be at Least 5 Characters',
            'email.required' => 'Email Must Be Filled In',
            'email.unique' => 'Email Has Already Been Registered',
            'gender.required' => 'Gender Must Be Selected',
            'gender.in' => 'Invalid Gender Selection',
            'room_number.required' => 'Room Number Must Be Filled In',
            'room_number.min' => 'Room Number Must Be at Least 3 Characters',
            'room_number.regex' => 'Room Number Can Only Contain Alphanumeric Characters and dash',
            'phone_number.required' => 'Phone Number Must Be Filled In',
            'phone_number.regex' => 'Invalid Phone Number Format (e.g., 1234567890)',
            'phone_number.unique' => 'Phone Number Has Already Been Registered',
        ]);

        $user = Auth::user();
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'gender'=>$request->gender,
            'room_number'=>$request->room_number,
            'phone_number'=>$request->phone_number,

        ]);
        return redirect()->route('edit_profile')->with('status','profile update successfully');

}

function getParcelsUser(Request $request)
    {
        $userId = Auth::id();
        $interval = $request->input('interval');
        $OverallParcel = DB::table('parcels')->where('user_id', $userId)->count();
        $totalParcel = 0;
        // Use $interval to fetch parcel data based on the selected interval
        // Modify the query accordingly for daily, weekly, or monthly intervals

        // Example: For daily interval
        if ($interval === 'daily') {
            $totalParcel = DB::table('parcels')->where('status', '=', 'Collected')->where('user_id', $userId)->whereDate('collect_date', '=', now())->count();
        }

        // Example: For weekly interval
        elseif ($interval === 'weekly') {
            $totalParcel = DB::table('parcels')->where('status', '=', 'Collected')->where('user_id', $userId)->whereBetween('collect_date', [now()->startOfWeek(), now()->endOfWeek()])->count();
        }

        // Example: For monthly interval
        elseif ($interval === 'monthly') {
            $totalParcel = DB::table('parcels')->where('status', '=', 'Collected')->where('user_id', $userId)->whereMonth('collect_date', '=', now()->month)->count();
        }

        $goal = $OverallParcel; // Set a goal or total number as per your requirement

        return response()->json(['totalParcel' => $totalParcel, 'goal' => $goal]);
    }
    function getParcelsArrivedUser(Request $request)
    {
        $userId = Auth::id();
        $report = $request->input('report');
        $OverallParcel = DB::table('parcels')->where('user_id', $userId)->count();
        $totalParcel = 0;
        // Use $interval to fetch parcel data based on the selected interval
        // Modify the query accordingly for daily, weekly, or monthly intervals

        // Example: For daily interval
        if ($report === 'daily') {
            $totalParcel = DB::table('parcels')->where('user_id', $userId)->whereDate('date_received', '=', now())->where('user_id', $userId)->count();
        }

        // Example: For weekly interval
        elseif ($report === 'weekly') {
            $totalParcel = DB::table('parcels')->where('user_id', $userId)->where('user_id', $userId)->whereBetween('date_received', [now()->startOfWeek(), now()->endOfWeek()])->count();
        }

        // Example: For monthly interval
        elseif ($report === 'monthly') {
            $totalParcel = DB::table('parcels')->where('user_id', $userId)->where('user_id', $userId)->whereMonth('date_received', '=', now()->month)->count();
        }

        $goal = $OverallParcel; // Set a goal or total number as per your requirement

        return response()->json(['totalParcel' => $totalParcel, 'goal' => $goal]);
    }
}
