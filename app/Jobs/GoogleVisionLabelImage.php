<?php

namespace App\Jobs;

use App\Models\AdImage;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class GoogleVisionLabelImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $ad_image_id;

    public function __construct($ad_image_id)
    {
        $this->ad_image_id = $ad_image_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $i = AdImage::find($this->ad_image_id);

        if(!$i){return; }

        $image = file_get_contents(storage_path('/app/' . $i->file));

         //imposta la variabile di ambiente GOOGLE_APPLICATION_CREDENTIALS
        //al path del credentials file

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();

        $response = $imageAnnotator->labelDetection($image);
        $labels = $response->getLabelAnnotations();
        
        if($labels) {
            
        $result = [];
        foreach ($labels as $label) {
            $result[] = $label->getDescription();
        }

        echo json_encode($result);
        $i->labels = json_encode($result);
        $i->save();

        }

        $imageAnnotator->close();

    }
}
