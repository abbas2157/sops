<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\BatchCreationEmail;
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};
class BatchCreationEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $email;
    private $batch;
    public function __construct($email,$batch)
    {
        $this->email = $email;
        $this->batch = $batch;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('coris92521@cutxsew.com')->send(new BatchCreationEmail($this->batch));
    }
}
