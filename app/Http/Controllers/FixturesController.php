<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FixturesController extends Controller
{
    public function getData()
    {
        $apiKey = 'WxLtGy9Mx6msheZOC3IISAGlqUcDp1qkbudjsnpL91tbHWQTPF';
        $url = 'https://sportdata.p.mashape.com/api/v1/free/soccer/matches/fixtures/premier-league&key=' . $apiKey;

        return json_decode(file_get_contents($url), true);
    }

    public function getFixtures()
    {
        
    }
}
