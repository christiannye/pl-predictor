<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Fixture;
use App\Result;
use Zttp\Zttp;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        $fixtures = $this->getFixtures();
        $results  = $this->getResults();
        $gameweekStart  = Carbon::now()->subDay()->previous(Carbon::FRIDAY)->toDateString();
        $gameweekEnd    = Carbon::now()->subDay()->startOfWeek(Carbon::MONDAY)->toDateString();


        $test = Result::where('dtime', '>=', $gameweekStart)
                     ->where('dtime', '<=', $gameweekEnd)->get();

        // return $test;

        // return "{$gameweekStart} - {$gameweekEnd}";

        return view('welcome', compact('fixtures', 'results'));
    }

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

        return $data->json();
    }

}
