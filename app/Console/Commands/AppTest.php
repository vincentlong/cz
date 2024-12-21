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

        $config = [
            'default' => ConfigService::get('storage', 'default', 'local'),
            'engine' => ConfigService::get('storage') ?? ['local' => []],
        ];

        // 2、执行文件上传
        $driver = new StorageDriver($config);
        $driver->delete('/uploads/images/20241113/2024111317322465cca0840.png');
    }

}
