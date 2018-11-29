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
                        <img class="pl-badge" src="{{ url('/images/' . str_slug(strtolower($fixture['homeTeam'])) . '.png') }}"/>
                    </div>
                </div>
                <div class="fixture-list__vs col-2">vs</div>
                <div class="fixture-list__away-team col-5">
                    <span class="fixture-list__team-name">
                        {{ $fixture['awayTeam'] }}
                    </span>
                    <div class="pl-badge-wrap">
                        <img class="pl-badge" src="{{ url('/images/' . str_slug(strtolower($fixture['awayTeam'])) . '.png') }}"/>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="results-list col-12 col-sm-3">
        <div class="results-list__wrapper">
            <h3 class="results-list__title">Previous Gameweek</h3>
            @foreach($results as $result)
                <div class="results-list__fixture">
                    <img class="pl-badge pl-badge--small" src="{{ url('/images/' . str_slug(strtolower($result['homeTeam'])) . '.png') }}" data-toggle="tooltip" data-placement="top" title="{{ $result['homeTeam'] }}"/>
                    <span class="results-list__final-score">{{ $result['homeGoals'] }} - {{ $result['awayGoals'] }}</span>
                    <img class="pl-badge pl-badge--small" src="{{ url('/images/' . str_slug(strtolower($result['awayTeam'])) . '.png') }}" data-toggle="tooltip" data-placement="top" title="{{ $result['awayTeam'] }}"/>
                </div>
            @endforeach
        </div>
    </div>
@endsection
