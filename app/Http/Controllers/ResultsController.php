<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultsController extends Controller
{
    public function index()
    {
        // $apiKey = 'WxLtGy9Mx6msheZOC3IISAGlqUcDp1qkbudjsnpL91tbHWQTPF';
        // $url = 'https://sportdata.p.mashape.com/api/v1/free/soccer/matches/fixtures/premier-league&key=' . $apiKey;

        // return json_decode(file_get_contents($url), true);

        $results = json_decode(file_get_contents(base_path('storage/results.json'), true));

        return view('welcome', compact('results'));
    }
}
