<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\organisations;
use App\Jobs\organisationCsvProcess;
class uploadController extends Controller
{
    public function upload(Request $request){
        $request->file('mycsv');
        $data=file($request->file('mycsv'));
        $chunks=array_chunk($data,1000);
        foreach($chunks as $key => $chunk){
            $name="tmp".$key.".csv";
            $path=resource_path("temp");
            file_put_contents($path.'/'.$name,$chunk);
        }

        $path=resource_path("temp");
$files=glob($path.'/*.csv');

foreach($files as $key => $file){
    organisationCsvProcess::dispatch($file,$key);
}
       return "done";
    }

    
}
