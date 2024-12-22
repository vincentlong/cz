<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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
        $tableName = 'la_admin';
//        $res = DB::select("SHOW FULL COLUMNS FROM `{$tableName}`");
//        dd($res);
//        dd($res[0]->Comment);
        $res = Schema::getColumns('admin');
        dd($res[12]['comment']);
    }

}
