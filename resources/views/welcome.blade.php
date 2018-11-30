@extends('layouts.default')
@include('partials.navbar')
@section('body')

<h2 class="sub-title">Gameweek 14 Predictions</h3>

<div class="row no-margin">
    <div class="fixtures-list text-center col-12 col-sm-9">
        @foreach($fixtures as $fixture)
            <div class="fixture-list__fixture row">
                <div class="fixture-list__kickoff styled-title">{{ Carbon\Carbon::parse($fixture['dtime'])->format('l, jS F - G:i') }}</div>
                <div class="fixture-list__home-team col-4">
                    <span class="fixture-list__team-name">
                        {{ $fixture['homeTeam'] }}
                    </span>
                    <div class="pl-badge-wrap">
                        <img class="pl-badge" src="{{ url('/images/' . str_slug(strtolower($fixture['homeTeam'])) . '.png') }}"/>
                    </div>
                </div>
                <div class="fixture-list__prediction col-4">Your Prediction</div>
                <div class="fixture-list__away-team col-4">
                    <span class="fixture-list__team-name">
                        {{ $fixture['awayTeam'] }}
                    </span>
                    <div class="pl-badge-wrap">
                        <img class="pl-badge" src="{{ url('/images/' . str_slug(strtolower($fixture['awayTeam'])) . '.png') }}"/>
                    </div>
                </div>
                <div class="fixture-list__bottom row">
                    <div class="fixture-list__result col-6">
                        Result: <span class="fixture-list__round-small">- -</span>
                    </div>
                    <div class="fixture-list__points-wrap col-6">
                        Points: <span class="fixture-list__round-small">0</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="results-list col-12 col-sm-3">
        <h3 class="results-list__title styled-title">Previous Gameweek</h3>
        <div class="results-list__wrapper">
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
