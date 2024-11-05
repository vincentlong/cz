<?php

namespace App\Console\Commands;

use App\Common\Model\Article\Article;
use app\common\model\article\ArticleCate;
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
        $res = Article::query()->take(1)->get();
        dd($res->toArray());
    }

}
