<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Account;
use App\Mail\DailyReports;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class DailyApplicationReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily-application-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dailyapps = Account::whereDate('created_at', Carbon::today())->count();

        if($dailyapps == 0) {

            $this->info('Query result is empty. Cron job will not be executed.');
            return;
        }  

        $recipients = [
            'kudam775@gmail.com',
        ];

        Mail::to($recipients)->send(new DailyReports());
    }
}
