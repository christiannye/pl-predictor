<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Zttp\Zttp;

class PageController extends Controller
{
    public function index()
    {
        $fixtures = $this->getFixtures();
        $results  = $this->getResults();

        return view('welcome', compact('fixtures', 'results'));
    }

    protected function getFixtures()
    {
        $url = 'https://sportdata.p.mashape.com/api/v1/free/soccer/matches/fixtures/premier-league';

        $fixtures = Zttp::withHeaders([
            "X-Mashape-Key" => "WxLtGy9Mx6msheZOC3IISAGlqUcDp1qkbudjsnpL91tbHWQTPF",
            "Accept" => "application/json"
        ])->get($url, []);

        return $fixtures->json();
    }

    protected function getResults()
    {
        $url = 'https://sportdata.p.mashape.com/api/v1/free/soccer/matches/results/premier-league';

        $results = Zttp::withHeaders([
            "X-Mashape-Key" => "WxLtGy9Mx6msheZOC3IISAGlqUcDp1qkbudjsnpL91tbHWQTPF",
            "Accept" => "application/json"
        ])->get($url, []);

        return $results->json();
    }

}
