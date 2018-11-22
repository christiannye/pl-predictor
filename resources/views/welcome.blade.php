@extends('layouts.default')

@section('body')

<h1 class="text-center" style="margin: 30px 0">Premier League Predictor</h1>

<div class="fixtures-list text-center">
    @foreach($fixtures as $fixture)
        <div class="fixture-list__fixture row">
            <div class="fixture-list__kickoff">{{ Carbon\Carbon::parse($fixture->dtime)->format('l, jS F - G:i') }}</div>
            <div class="fixture-list__home-team col-5">
                <span class="fixture-list__team-name">
                    {{ $fixture->homeTeam }}
                </span>
                <div class="pl-badge-wrap">
                    <div class="pl-badge pl-badge__{{ str_slug(strtolower($fixture->homeTeam)) }}"></div>
                </div>
            </div>
            <div class="fixture-list__vs col-2">vs</div>
            <div class="fixture-list__away-team col-5">
                <span class="fixture-list__team-name">
                    {{ $fixture->awayTeam }}
                </span>
                <div class="pl-badge-wrap">
                    <div class="pl-badge pl-badge__{{ str_slug(strtolower($fixture->awayTeam)) }}"></div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
