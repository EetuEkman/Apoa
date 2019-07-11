<navbar class="navbar is-fixed-top">
    <div class="navbar-brand">
        <a class="navbar-item" href="/home">
            Apoa
        </a>
        <a class="navbar-burger burger">
            <span></span>
            <span></span>
            <span></span>
        </a>
    </div>
    <div class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="/assessments">Arvioinnit</a>
            <a class="navbar-item" href="/responses">Vastaukset</a>
            <a class="navbar-item" href="/users">Käyttäjät</a>
            <a class="navbar-item" href="/groups">Luokat</a>
        </div>
        <div class="navbar-end">
            <a class="navbar-item" href="user/{{auth()->user()->id}}/edit">{{auth()->user()->email}}</a>
            <a class="navbar-item" href="/logout"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{__('Kirjaudu ulos')}}
            </a>
            <form id="logout-form" action="/logout" method="post" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</navbar>

<script>
    $(document).ready(function () {
        // Check for click events on the navbar burger icon
        $(".navbar-burger").click(function () {
            // Toggle the "is-active" class on both the "navbar-burger"
            // and the "navbar-menu"
            $(".navbar-burger").toggleClass("is-active");
            $(".navbar-menu").toggleClass("is-active");
        });
    });
</script>
