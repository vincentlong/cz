<?php

namespace App\Console\Commands;

use App\Common\Cache\BarCache;
use App\Common\Cache\FooCache;
use App\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

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
        dd(Config::get('project.version'));
    }
}
