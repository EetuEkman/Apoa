<section class="hero is-primary is-medium is-bold">
    <div class="hero-head">
        <navbar class="navbar">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item" href="/home">
                        Apoa
                    </a>
                    <span class="navbar-burger burger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                </div>
                <div class="navbar-menu">
                    <div class="navbar-start">
                        <a class="navbar-item" href="/assessments">Arvioinnit</a>
                        <a class="navbar-item" href="/responses">Vastaukset</a>
                        <a class="navbar-item" href="/users">Käyttäjät</a>
                        <a class="navbar-item" href="/groups">Luokat</a>
                    </div>
                    <div class="navbar-end">
                        <a class="navbar-item" href="user/{{Auth::user()->id}}/edit">{{Auth::user()->email}}</a>
                        <a class="navbar-item" href="/logout"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{__('Kirjaudu ulos')}}
                        </a>
                        <form id="logout-form" action="/logout" method="post" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </navbar>
    </div>
</section>
