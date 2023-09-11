<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Customers;
use App\Jobs\customerCsvProcess;

class uploadController extends Controller
{
    public function upload(Request $request)
    {
        $arr = mb_convert_encoding(file($request->file_to_upload), 'UTF-8', 'UTF-8');
        $chunks = array_chunk($arr,1000);
        $header = [];
        foreach($chunks as $key => $chunk) {
            $data = array_map('str_getcsv',$chunk);
            if($key === 0){
                $header = $data[0];
                unset($data[0]);
            }
            if($key === 20) {
                $header = [];
            }
            customerCsvProcess::dispatch($data, $header);
        }
        return 'Stored';
    }
}