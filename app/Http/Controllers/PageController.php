<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Zttp\Zttp;
use App\Fixtures;

class PageController extends Controller
{
    public function index()
    {
        $fixtures = $this->getFixtures();
        $results  = $this->getResults();

        // $fixturestwo = Fixtures::all();

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
