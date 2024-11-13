<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class creatuseadmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'creatuseradmin';

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
        $this->info('-----------------------------------------');
        $this->info('Your are Now creating Admin Account');
        $this->info('-----------------------------------------');

     

        $name = $this->ask('Name?');
        $email = $this->ask('Email?');
        $password = $this->secret('Password?');

        $cmdvalidation = Validator ::make([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ], [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($cmdvalidation->fails()) {
            foreach ($cmdvalidation->errors()->all() as $inputerror) {
                $this->error($inputerror);
              
            }
            $this->info('-----------------------------------------');
            $this->info('Please Try Again');
            $this->info('-----------------------------------------');
            return 1;
            
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'is_admin' => 1,
        ]);

        $this->info('User created successfully!');
    }
}
