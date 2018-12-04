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
        $fixtures         = $this->getFixtures();
        $results          = $this->getResults();
        $currentGwResults = $this->getCurrentGwResults();

        return view('welcome', compact('fixtures', 'results', 'currentGwResults'));
    }

    protected function getFixtures() {
        return $this->betweenDates(
            now()->startOfDay()->previousWeekday(Carbon::FRIDAY)->toDateString(),
            now()->startOfDay()->next(Carbon::THURSDAY)->toDateString(),
            'Fixture'
        );
    }

    protected function getResults() {
        return $this->betweenDates(
            now()->startOfDay()->subDays(7)->previous(Carbon::FRIDAY)->toDateString(),
            now()->startOfDay()->subDays(7)->startOfWeek()->toDateString()
        );
    }

    protected function getCurrentGwResults() {
        return $this->betweenDates(
            now()->startOfDay()->subDay()->previous(Carbon::FRIDAY)->toDateString(),
            now()->startOfDay()->startOfWeek()->toDateString()
        );
    }

    protected function betweenDates($gws, $gwe, $model = 'Result')
    {
        $model = "\App\\" . $model;
        return (new $model)
            ->whereBetween('dtime', [$gws, $gwe])
            ->get()
            ->sortBy('dtime');
    }
}
