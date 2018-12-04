<div class="container">
    <div class="row">
        <div class="col-9">
            <h1 class="main-title">Premier League Predictor 18/19</h1>
        </div>
        <div class="col-3">
            <ul>
                @if(auth()->check())
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="#">Hi, {{ auth()->user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Log Out</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
