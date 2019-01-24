<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <div class="row" style="width: 100%">
            <div class="{{ Request::is('predictions') ? 'col-9' : 'col-12' }} ">
                <h1 class="main-title">Premier League Predictor 18/19</h1>
            </div>
            @if(Request::is('predictions'))
                <div class="col-3 login-area">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            @if(auth()->check())
                                <li>
                                    <span>Hi, {{ auth()->user()->name }}</span>
                                </li>
                                <li>
                                    <a href="/logout">Log Out</a>
                                </li>
                            @else
                                <li>
                                    <a href="/login">Log In</a>
                                </li>
                                <li>
                                    <a href="/register">Register</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
</nav>
