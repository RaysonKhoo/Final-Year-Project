<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessParcelPhotos implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $parcel;
    protected $photoPaths;
    /**
     * Create a new job instance.
     */
    public function __construct($parcel, $photoPaths)
    {
        $this->parcel = $parcel;
        $this->photoPaths = $photoPaths;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->photoPaths as $path) {
            // Assuming you want to store photos in a specific directory
            $path = $photo->store('photos', 'public');

            $this->parcel->photos = json_encode([...json_decode($this->parcel->photos), $path]);
        }

        $this->parcel->save();
    }
}

