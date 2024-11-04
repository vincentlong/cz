<?php

namespace App\Console\Commands;

use App\Common\Model\Auth\SystemRole;
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
        $res = SystemRole::query()->take(3);
        dd($res->get()->toArray());
    }
}
