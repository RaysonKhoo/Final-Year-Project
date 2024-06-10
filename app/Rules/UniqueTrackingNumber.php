<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Parcel;

class UniqueTrackingNumber implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if a record with the given tracking number exists
        return !Parcel::where('tracking_number', $value)->exists();
    }

    public function message()
    {
        return 'The tracking number already exists.';
    }
}
