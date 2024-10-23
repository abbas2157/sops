<?php

namespace App\Console\Commands\Reminders;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\{Auth, Hash, Mail, DB, Cookie};
use App\Models\{Trainer, Workshop, WorkshopRegistration};
use Illuminate\Support\Str;
use App\Jobs\WorkshopReminderEmailJob;
use App\Models\User;
use Carbon\Carbon;

class SendWorkshopMails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:send-workshop-mails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reminder Email for Workshop';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        date_default_timezone_set("Asia/Karachi");

        $workshops = Workshop::whereDate('workshop_date', '>=', date('Y-m-d'))->whereDate('workshop_date', '<=', date('Y-m-d'))->get();
        if(!is_null($workshops)) {
            foreach($workshops as $workshop) {
                $workshop_time = (int) str_replace(':','', $workshop->workshop_time);
                $current_time = (int) str_replace(':','', date('H:i:s'));
                $left_time = $workshop_time - $current_time;
                if($left_time <= 10000) {
                    $users = WorkshopRegistration::where('one_hour_mail', 0)->get();
                    if(!is_null($users)) {
                        foreach($users as $user) {
                            $workshop->reminder_type = 1;
                            // WorkshopReminderEmailJob::dispatch($user, $workshop);
                            $user->one_hour_mail = 1;
                            $user->save();
                        }
                    }
                }
                else if($left_time <= 240000 && $left_time > 90000)
                {
                    $users = WorkshopRegistration::where('hour_24_mail', 0)->get();
                    if(!is_null($users)) {
                        foreach($users as $user) {
                            $workshop->reminder_type = 24;
                            WorkshopReminderEmailJob::dispatch($user, $workshop);
                            $user->hour_24_mail = 1;
                            $user->save();
                        }
                    }
                }
            }
        }
    }
}
