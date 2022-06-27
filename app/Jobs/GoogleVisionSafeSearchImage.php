<?php

namespace App\Jobs;

use App\Models\AnnounceImage;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GoogleVisionSafeSearchImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $announce_image_id;


    public function __construct($announce_image_id)
    {
        $this->announce_image_id = $announce_image_id;
    }


    public function handle()
    {
        $i = AnnounceImage::find($this->announce_image_id);

        if (!$i) {
            return;
        }

        $image = file_get_contents(storage_path('/app/' . $i->file));

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->safeSearchDetection($image);
        $imageAnnotator->close();

        $safe = $response->getSafeSearchAnnotation();

        $adult = $safe->getAdult();
        $medical = $safe->getMedical();
        $spoof = $safe->getSpoof();
        $violence = $safe->getViolence();
        $racy = $safe->getRacy();

        $likeliHoodName = [
            'UNKNOWN', 'VERY_UNLIKELY', 'UNLIKELY', 'POSSIBLE', 'LIKELY', 'VERY_LIKELY'
        ];

        $i->adult = $likeliHoodName[$adult];
        $i->medical = $likeliHoodName[$medical];
        $i->spoof = $likeliHoodName[$spoof];
        $i->violence = $likeliHoodName[$violence];
        $i->racy = $likeliHoodName[$racy];

        $i->save();
    }
}