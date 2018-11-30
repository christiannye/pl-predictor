<?php

namespace App\Console\Commands;

use App\Fixture;
use App\Result;
use Zttp\Zttp;
use Carbon\Carbon;
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

        return Zttp::withHeaders([
        "X-Mashape-Key" => "WxLtGy9Mx6msheZOC3IISAGlqUcDp1qkbudjsnpL91tbHWQTPF",
        "Accept" => "application/json"
        ])->get($url, [])->json();
    }

    public function handle()
    {
        $this->info('Starting Fixture and Results import...');

        collect($this->getFixtures())->each(function ($fixture, $key) {
            $fixture['dtime'] = "{$fixture['day']} {$fixture['hour']}:00";
            $fixture['dtime'] = Carbon::parse("{$fixture['day']} {$fixture['hour']}:00")->toDateTimeString();
            unset($fixture['day'], $fixture['hour']);

            Fixture::create($fixture);
        });

        $this->info('Fixtures Imported');

        collect($this->getResults())->each(function ($result, $key) {
            $result['dtime'] = "{$result['day']} {$result['hour']}:00";
            $result['dtime'] = Carbon::parse("{$result['day']} {$result['hour']}:00")->toDateTimeString();
            unset($result['day'], $result['hour']);

            Result::create($result);
        });

        $this->info('Results Imported');

        $this->info('All Imports Completed');
    }
}
