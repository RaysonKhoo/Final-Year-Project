<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScanController extends Controller
{
    public function processScan(Request $request)
    {
        $TrackingNumber = $request->input('tracking_number');

        // Process the scanned barcode as needed
        // For example, save it to a database, perform actions, or return a response

        return response()->json(['tracking_number' => $TrackingNumber]);
    }

}
