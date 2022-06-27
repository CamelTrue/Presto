<?php

namespace App\Jobs;

use App\Models\AnnounceImage;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisionLabelImage implements ShouldQueue
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
        $response = $imageAnnotator->LabelDetection($image);
        $labels = $response->getLabelAnnotations();

        if ($labels) {
            $result = [];
            
            foreach($labels as $label) {
                $result[] = $label->getDescription();
            }

            $i->labels = $result;
            $i->save();
        }
        
        $imageAnnotator->close();
    }
}