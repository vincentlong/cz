<?php

namespace App\Console\Commands;

use App\Common\Cache\BarCache;
use App\Common\Cache\FooCache;
use App\Models\Admin;
use Illuminate\Console\Command;
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
        $fooCache = new FooCache();
        $fooCache->set('name', 'foo');
        dump($fooCache->get('name'));

        $barCache = new BarCache();
        $barCache->set('name', 'bar');
        dump($barCache->get('name'));
        dump($fooCache->get('name'));

    }
}
