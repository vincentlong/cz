<?php

namespace App\Console\Commands;

use App\Common\Events\NoticeEvent;
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
        event(new NoticeEvent([
            'scene_id' => 101,
            'params' => [
                'mobile' => 15521226475,
                'code' => mt_rand(1000, 9999),
            ]
        ]));
    }

}
