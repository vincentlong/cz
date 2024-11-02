<?php

namespace App\Console\Commands;

use App\Common\Model\Auth\SystemMenu;
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
        $query = SystemMenu::query()->where([
            ['id', '>', 0],
            ['id', '<', 10],
//            ['type', ['in' =>  ['M', 'C']]], // 都不对
//            ['type', 'in', ['M', 'C']], // 都不对
        ]);
        $query->whereIn('type', ['Cc','M']); // 正确
        $res = $query->get(); // 正确
        dd($res->pluck('id'));
    }
}
