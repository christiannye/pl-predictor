<?php

namespace App\Console\Commands;

use App\Fixtures;
use App\Results;
use Zttp\Zttp;
use Illuminate\Console\Command;

class ImportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Fixtures and Results';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */

    protected function getFixtures() {
        return $this->getData('fixtures');
    }

    protected function getResults() {
        return $this->getData('results');
    }

    protected function getData($type) {
        $url = 'https://sportdata.p.mashape.com/api/v1/free/soccer/matches/'.$type.'/premier-league';

        $data = Zttp::withHeaders([
        "X-Mashape-Key" => "WxLtGy9Mx6msheZOC3IISAGlqUcDp1qkbudjsnpL91tbHWQTPF",
        "Accept" => "application/json"
        ])->get($url, []);
    }

    public function handle()
    {
        $this->info('Starting Fixture and Results import...');

        $this->info('Fixture and Results Import Completed');
    }
}
