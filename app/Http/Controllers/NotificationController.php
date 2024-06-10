<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Parcel;
use App\models\Notification;
use App\Events\NotificationRead;
use App\Notifications\reselectDateTime;
use Illuminate\Support\Facades\Redis;
use Carbon\Carbon;

class NotificationController extends Controller
{
    function markAsRead()
    {
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();
        return redirect()->back();
    }

     function clearAll()
    {
        $user = Auth::user();

        $user->notifications()->delete();

        return redirect()->back();
    }
    function ReselectDateTimeSelection(Request $request, $id)
    {
        $parcel = Parcel::with('user')->find($id);
        $user = $parcel->user;
        $reselect = [
            'greeting' => 'Hi ' . $user->name,
            'body' => 'Your parcel with tracking number' . $parcel->tracking_number . ' has arrived.',
            'reselectText' => 'View your parcel',
            'url' => url('/'),
            'thankyou' => 'You can visit us to collect',
            'expirationMessage' => 'Please note that the date and time selection period has expired. Kindly reselect your date and time for parcel collection.'
        ];

        $user->notify(new reselectDateTime($reselect));
        return redirect()->route('Userparcel.list')->with('success', 'Parcel notification has send!');
    }

}
