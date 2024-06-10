<?php

namespace App\Http\Controllers;
use App\Models\Parcel; // Make sure to import the Announcement model
use Illuminate\Support\Facades\Auth;
use App\models\User;
use App\Rules\UniqueTrackingNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Notifications\ParcelNotify;
use App\Notifications\UpdateParcelNotify;
use App\Notifications\reselectDateTime;

class ParcelController extends Controller
{
    function Addparcel()
    {
        $parcel = Parcel::all(); // Assuming you have an Announcement model
        return view('dashboard_page.staff.AddParcel', compact('parcel'));
    }
    function storeParcel(Request $request)
    {
        $request->validate([
            'date_received' => 'required|date',
            'tracking_number' => ['required','string', new UniqueTrackingNumber],
            'phone_number' => 'required|regex:/^[0-9]{10,}$/', // Assumes a 10-digit phone number
            'courier_name' => 'required|in:NinjaVan,ShoppeXpress,PosLaju,J&T,Other',

        ],[
            'tracking_number.required' => 'Tracking Number cannot empty',
            'phone_number.required' => 'Phone Number Must Be Filled In',
            'phone_number.regex' => 'Invalid Phone Number Format (e.g., 1234567890)',
            'courier_name.required' => 'Courier must be selected',
            'courier_name.in' => 'invalid courier selection',
        ]);

        if($request->input('courier_name') === 'Other')
        {
            $request->validate([
                'custom_courier' => 'required|string',
            ], [
                'custom_courier.required' => 'Custom Courier Name must be provided for "Other" option'
            ]);
            $courierName = $request->input('custom_courier');
        }else {
            $courierName = $request->input('courier_name');
        }
        $user = User::where('phone_number', $request->phone_number)->first();
        if ($user) {
            // Create a new Parcel instance
            $parcel = new Parcel();
            $parcel->date_received = $request->input('date_received');
            $parcel->tracking_number = $request->input('tracking_number');
            $parcel->phone_number = $request->input('phone_number');
            $parcel->status = 'Available';
            $parcel->name = $user->name;
            $parcel->room_number = $user->room_number; // Retrieve the room number from the user
            $parcel->user_id = $user->id;
            $staff_id = auth()->id(); // Get the authenticated staff's ID
            $parcel->staff_id = $staff_id;
            $parcel->courier_name = $courierName;
            $parcel->save();
            $notify = [
                'greeting' => 'Hi ' . $user->name,
                'body' => 'Your parcel with tracking number ' . $parcel->tracking_number . ' has arrived.',
                'notifyText' => 'View your parcel',
                'url' => url('/'),
                'thankyou' => 'You can visit us to collect'
            ];

            $user->notify(new ParcelNotify($notify));
            return redirect()->route('AddParcel')->with('success', 'Parcel has been recorded and notification has send!');
        } else {
            // Handle the case where the user with the provided phone_number is not found
            // You might want to show an error message or take other appropriate actions
            return redirect()->route('add.Parcel')->with('error','user not found');
        }
    }
    function parcelform() //for the not exiting user in the system
    {
        $parcel = Parcel::all(); // Assuming you have an Announcement model
        return view('dashboard_page.staff.parcelForm', compact('parcel'));
    }
    function saveParcel(Request $request)
    {
        $request->validate([
            'date_received' => 'required|date',
            'tracking_number' => ['required','string', new UniqueTrackingNumber],
            'name' => 'required|string|min:5',
            'room_number' => 'required|min:3|regex:/^[a-zA-Z0-9-]+$/', // Validates uniqueness in 'users' table
            'phone_number' => 'required|regex:/^[0-9]{10,}$/', // Assumes a 10-digit phone number
            'courier_name' => 'required|in:NinjaVan,ShoppeXpress,PosLaju,J&T,Other',
        ],[
            'tracking_number.required' => 'Tracking Number cannot empty',
            'name.required' => 'Full Name Must Be Filled In',
            'name.min' => 'Full Name Must Be at Least 5 Characters',
            'room_number.required' => 'Room Number Must Be Filled In',
            'room_number.min' => 'Room Number Must Be at Least 3 Characters',
            'room_number.regex' => 'Room Number Can Only Contain Alphanumeric Characters and dash',
            'phone_number.required' => 'Phone Number Must Be Filled In',
            'phone_number.regex' => 'Invalid Phone Number Format (e.g., 1234567890)',
            'courier_name.required' => 'Courier must be selected',
            'courier_name.in' => 'invalid courier selection',
        ]);
        if($request->input('courier_name') === 'Other')
        {
            $request->validate([
                'courier_name' => 'required|string',
            ], [
                'courier_name.required' => 'Custom Courier Name must be provided for "Other" option'
            ]
        );
        }


        $parcel = new Parcel();
            $parcel->date_received = $request->input('date_received');
            $parcel->tracking_number = $request->input('tracking_number');
            $parcel->name = $request->input('name');
            $parcel->room_number = $request->input('room_number');
            $parcel->phone_number = $request->input('phone_number');
            $parcel->courier_name = $request->input('courier_name');
            $parcel->status = 'Available';
            $user_id = auth()->id(); // Get the authenticated staff's ID
            $parcel->user_id = $user_id;
            $staff_id = auth()->id(); // Get the authenticated staff's ID
            $parcel->staff_id = $staff_id;
            if ($request->input('courier_name') === 'Other') {
                $parcel->courier_name = $request->input('courier_name');
            }
            $parcel->save();

            return redirect()->route('AddParcel')->with('success', 'Parcel has been recorded!');
    }
    function ParcelList()
    {
        $parcel = Parcel::where('status','!=','Collected')->get();
        return view('dashboard_page.staff.ParcelList', compact('parcel'));
    }
    function deleted(Request $request, $id)
    {
        Parcel::where('id',$request->id)->delete();
        return redirect()->route('Userparcel.list')->with('success', 'Parcel has been Remove');
    }
    function edit($id)
    {
        $parcel = Parcel::find($id);
        return view('dashboard_page.staff.parceledit', compact('parcel'));
    }
    function UserParcelList()
    {
        $user = Auth::user();
        $parcel = Parcel::where('User_id', $user->id)->where('status', '!=', 'Collected')->get();
        return view('dashboard_page.user.Parcellist', ['parcel' => $parcel]);
    }
   function confirmReceived(Request $request, $id)
    {
        $request->validate([
            'photos' => 'required|mimes:jpeg,png,jpg|max:2048',
        ],[
            'photos.required' => 'Photos should be upload',
        ]);
        $filename = '';
        if ($request->hasFile('photos')) {
            $filename = $request->getSchemeAndHttpHost() . '/picture/parcels/' . time() . '.' . $request->file('photos')->extension();
            $request->file('photos')->move(public_path('/picture/parcels'), $filename);
        }
        $parcel = Parcel::with('user')->find($id);
        $user = $parcel->user;
        // Update the parcel record in the database with the new collection date
        $parcel->collect_date = Carbon::now();
        $parcel->status= 'Collected';
        $parcel->photos = $filename;
        $parcel->save();
        $Updatenotify = [
            'greeting' => 'Hi ' . $user->name,
            'Updatedata' => 'Your parcel with tracking number ' . $parcel->tracking_number . ' has been collected.',
            'notifyText' => 'View Your Parcel',
            'url' => url('/'),
            'thankyou' => 'Thanks'
        ];
        $user->notify(new UpdateParcelNotify($Updatenotify));
        // Return a response (you can use JSON responses if needed)
        return redirect()->route('Userparcel.list')->with('success','Parcel Collected Successfully');
    }
    function timeSelection(Request $request, $id)
    {
        $parcel = Parcel::find($id);
        $request->validate([
            'selection_time.required'=>'selection time must be filled in',
            'selection_date.required'=>'selection time must be filled in',
        ]);
        $parcel->selection_time = $request->input('selection_time');
        $parcel->selection_date = $request->input('selection_date');
        $parcel->save();
        return redirect()->route('parcel.list')->with('success', 'time collect parcel has been recorded!');

    }
    function getParcelHistory(Request $request)
    {
        $trackingNumber = $request->input('ref_no');

        $result = Parcel::where('tracking_number', $trackingNumber)->first();

        return response()->json($result ? $result->status : "Tracking number $trackingNumber not found.");

    }

}


