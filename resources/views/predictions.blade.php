@extends('layouts.default')
@include('partials.navbar')
@section('body')

<h2 class="sub-title">Gameweek Predictions</h3>

<div class="row no-margin">
    @if (Auth::check())
        <div class="fixtures-list text-center col-12 col-sm-9">
            @foreach ($currentGwResults as $result)
                @include('partials.gameweek-block', ['type' => $result, 'default' => true])
            @endforeach
            @foreach($fixtures as $fixture)
                @include('partials.gameweek-block', ['type' => $fixture, 'default' => false])
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
    @else
        <p>You need to be logged in to make predictions. Please login below or create a new account below:</p>
        @include('partials.login')
        <a href="/register">Register New Account</a>
    @endif
@endsection
