@extends('layouts.default')

@section('body')

<h1 class="text-center" style="margin: 30px 0">Premier League Predictor</h1>

<div class="row">
    <div class="fixtures-list text-center col-12 col-sm-9">
        @foreach($fixtures as $fixture)
            <div class="fixture-list__fixture row">
                <div class="fixture-list__kickoff">{{ Carbon\Carbon::parse($fixture['dtime'])->format('l, jS F - G:i') }}</div>
                <div class="fixture-list__home-team col-5">
                    <span class="fixture-list__team-name">
                        {{ $fixture['homeTeam'] }}
                    </span>
                    <div class="pl-badge-wrap">
                        <div class="pl-badge pl-badge__{{ str_slug(strtolower($fixture['homeTeam'])) }}"></div>
                    </div>
                </div>
                <div class="fixture-list__vs col-2">vs</div>
                <div class="fixture-list__away-team col-5">
                    <span class="fixture-list__team-name">
                        {{ $fixture['awayTeam'] }}
                    </span>
                    <div class="pl-badge-wrap">
                        <div class="pl-badge pl-badge__{{ str_slug(strtolower($fixture['awayTeam'])) }}"></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="results-list col-12 col-sm-3">
        <h3>Last week's results</h3>
        @foreach($results as $result)
            <p>{{ $result['homeTeam'] }} {{ $result['homeGoals'] }} - {{ $result['awayGoals'] }} {{ $result['awayTeam'] }}</p>
        @endforeach
    </div>
@endsection
