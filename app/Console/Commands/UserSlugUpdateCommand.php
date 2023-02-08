<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UserSlugUpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:slug';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'set slug to user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all();
        foreach ($users as $user) {
            $user->save();
        }
    }
}
