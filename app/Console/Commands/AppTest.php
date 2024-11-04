<?php

namespace App\Console\Commands;

use App\Adminapi\Logic\Auth\AuthLogic;
use Illuminate\Console\Command;

class AppTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

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
       $res = AuthLogic::getAuthByAdminId(4);
       dd($res);
    }
}
