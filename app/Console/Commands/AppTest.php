<?php

namespace App\Console\Commands;

use App\Common\Service\ConfigService;
use App\Common\Service\Storage\Driver as StorageDriver;
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
    protected $description = '开发测试';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $res = get_no_prefix_table_name('la_like_admin_user');
        dd($res);
    }

}
