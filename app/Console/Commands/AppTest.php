<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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
//        $tableName = 'la_admin';
//        $res = DB::select("SHOW FULL COLUMNS FROM `{$tableName}`");
//        dd($res);
//        dd($res[0]->Comment);
//        $res = Schema::getColumns('admin');
//        dd($res[12]['comment']);

//        $sql = 'SHOW TABLE STATUS WHERE 1=1 ';
//        $sql .= "AND name LIKE '%" . 'admin' . "%'";
//        $res = DB::select($sql);
//        dd($res);

        $tables = collect(DB::connection()->getDoctrineSchemaManager()->listTableNames())
            ->map(function ($table) {
                $tableInfo = DB::connection()->getDoctrineSchemaManager()->listTableDetails($table);
                return [
                    'name' => $table,
                    'comment' => $tableInfo->getComment(),
                    'engine' => $tableInfo->getEngine(),
                    'collation' => $tableInfo->getCollation(),
                    'rows' => $tableInfo->getRows(),
                    'auto_increment' => $tableInfo->getAutoIncrement(),
                    'create_time' => $tableInfo->getCreateTime(),
                    'update_time' => $tableInfo->getUpdateTime(),
                    'check_time' => $tableInfo->getCheckTime(),
                ];
            });

        $tables = $tables->filter(function ($table) {
            return str_contains($table['name'], 'admin');
        });

        dd($tables);
    }

}
