<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Customers;

class customersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach($arr as $item){
            Customers::create([
                'Title'=>$item[0],
                'Name'=>$item[1],
                'Age'=>$item[2],
                'Salary'=>$item[3],
                'Weight'=>$item[4],
                'Height'=>$item[5],
                'City'=>$item[6],
                'Occupation'=>$item[7],
                'Area'=>$item[8],
            ]);
        }
    }
}
