<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Parcel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class StaffController extends Controller
{
    function index()
    {
        return view('access/staff/index');

    }
    function userlist()
    {
        $users = User::all();
        return view('dashboard_page.staff.userlist', compact('users'));
    }
    function deleted(Request $request, $id)
    {
        User::where('id',$request->id)->delete();
        return redirect()->route('userlist')->with('success', 'Data user has been deleted');
    }
    function getParcels(Request $request)
    {   $totalParcel = 0;
        $interval = $request->input('interval');
        $OverallParcel = DB::table('parcels')->count();
        // Use $interval to fetch parcel data based on the selected interval
        // Modify the query accordingly for daily, weekly, or monthly intervals

        // Example: For daily interval
        if ($interval === 'daily') {
            $totalParcel = DB::table('parcels')->where('status', '=', 'Collected')->whereDate('collect_date', '=', now())->count();
        }

        // Example: For weekly interval
        elseif ($interval === 'weekly') {
            $totalParcel = DB::table('parcels')->where('status', '=', 'Collected')->whereBetween('collect_date', [now()->startOfWeek(), now()->endOfWeek()])->count();
        }

        // Example: For monthly interval
        elseif ($interval === 'monthly') {
            $totalParcel = DB::table('parcels')->where('status', '=', 'Collected')->whereMonth('collect_date', '=', now()->month)->count();
        }

        $goal = $OverallParcel; // Set a goal or total number as per your requirement

        return response()->json(['totalParcel' => $totalParcel, 'goal' => $goal]);
    }
    function getParcelsArrived(Request $request)
    {   $totalParcel = 0;
        $report = $request->input('report');
        $OverallParcel = DB::table('parcels')->count();
        // Use $interval to fetch parcel data based on the selected interval
        // Modify the query accordingly for daily, weekly, or monthly intervals

        // Example: For daily interval
        if ($report === 'daily') {
            $totalParcel = DB::table('parcels')->whereDate('date_received', '=', now())->count();
        }

        // Example: For weekly interval
        elseif ($report === 'weekly') {
            $totalParcel = DB::table('parcels')->whereBetween('date_received', [now()->startOfWeek(), now()->endOfWeek()])->count();
        }

        // Example: For monthly interval
        elseif ($report === 'monthly') {
            $totalParcel = DB::table('parcels')->whereMonth('date_received', '=', now()->month)->count();
        }

        $goal = $OverallParcel; // Set a goal or total number as per your requirement

        return response()->json(['totalParcel' => $totalParcel, 'goal' => $goal]);
    }


}
