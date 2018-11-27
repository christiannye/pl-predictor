<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return $fixtures = json_decode(file_get_contents(base_path('storage/fixtures.json'), true));
    }

    protected function getResults()
    {
        return $results = json_decode(file_get_contents(base_path('storage/results.json'), true));
    }

}
