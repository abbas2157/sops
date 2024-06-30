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
    private $students;
    private $batch;
    public function __construct($students,$batch)
    {
        $this->students = $students;
        $this->batch = $batch;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->students)->send(new BatchCreationEmail($this->batch));
    }
}
