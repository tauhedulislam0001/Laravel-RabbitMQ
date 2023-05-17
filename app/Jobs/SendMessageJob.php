<?php

namespace App\Jobs;

use App\Http\Controllers\Api\ProductController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        echo $this->message;
        $SendBkashController =(new ProductController)->store($this->message);
        echo $SendBkashController;
    }
}
