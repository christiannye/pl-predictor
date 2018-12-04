<div class="gameweek-list__fixture {{ $default ? 'gameweek-list-list__fixture--default' : '' }} row">
    <div class="gameweek-list__kickoff {{ $default ? 'gameweek-list__kickoff--default' : '' }} styled-title">{{ Carbon\Carbon::parse($type['dtime'])->format('l, jS F - G:i') }}</div>
    <div class="gameweek-list__home-team col-4">
        <span class="gameweek-list__team-name">
            {{ $type['homeTeam'] }}
        </span>
        <div class="pl-badge-wrap">
            <img class="pl-badge" src="{{ url('/images/' . str_slug(strtolower($type['homeTeam'])) . '.png') }}"/>
        </div>
    </div>
    <div class="gameweek-list__prediction col-4">
        <span class="your-prediction">Your Prediction</span>
        <div class="score">
            <div class="input-group score-buttons left">
              <input type="text" name="" min="0" max="10" class="form-control">
            </div>
            <span class="rectangle-bk"></span>
            <div class="input-group score-buttons right">
              <input type="text" name="" min="0" max="10" class="form-control">
            </div>
        </div>
    </div>
    <div class="gameweek-list__away-team col-4">
        <span class="gameweek-list__team-name">
            {{ $type['awayTeam'] }}
        </span>
        <div class="pl-badge-wrap">
            <img class="pl-badge" src="{{ url('/images/' . str_slug(strtolower($type['awayTeam'])) . '.png') }}"/>
        </div>
    </div>
    <div class="gameweek-list__bottom {{ $default ? 'gameweek-list__bottom--default' : '' }} row">
        <div class="gameweek-list__result col-6">
            Result: <span class="gameweek-list__round-small {{ $default ? 'gameweek-list__round-small--default' : '' }}">{{! $default ? '- -' : $type['homeGoals'] . ' - ' . $type['awayGoals'] }}</span>
        </div>
        <div class="gameweek-list__points-wrap col-6">
            Points: <span class="gameweek-list__round-small {{ $default ? 'gameweek-list__round-small--default' : '' }}">0</span>
        </div>
    </div>
</div>
