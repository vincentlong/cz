<?php

namespace App\Console\Commands;

use App\Common\Model\Auth\SystemRole;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

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
        $input = [
            'system_role',
            'system_role_menu',
        ];
        dd($this->formatUrl($input));
    }

    protected function formatUrl(array $data)
    {
        return array_map(function ($item) {
            return strtolower(Str::camel($item));
        }, $data);
    }
}
