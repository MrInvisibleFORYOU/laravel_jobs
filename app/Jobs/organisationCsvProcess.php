<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class organisationCsvProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
     public $file;
     public $key;
    public function __construct($file,$key)
    {
        $this->file=$file;
        $this->key=$key;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        
        $data=array_map('str_getcsv',file($this->file));
    
    if($this->key==0){   //it will take te header from first array
        $header=$data[0];
        unset($data[0]);
    }
    foreach($data as $value){
        $data_combine_with_header=array_combine($header,$value);
        organisations::create($data_combine_with_header);
    }
    unlink($file);
    }
}
