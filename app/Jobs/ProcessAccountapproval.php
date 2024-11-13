<?php

namespace App\Jobs;

use App\Mail\AccountApprovalMail;
use App\Models\User;
use App\Models\Account;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class ProcessAccountapproval implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    protected $account;
    protected $user;
    public function __construct(Account $account , User $user)
    {
        $this->account = $account;
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->account->user->email)->send(new AccountApprovalMail($this->account, $this->user));
    }
}
