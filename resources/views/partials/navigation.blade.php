<nav class="navbar is-fixed-top is-primary" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/home">
            Apoa
        </a>
        <a class="navbar-burger" role="button" aria-label="menu" aria-expanded="false" data-target="navigationMenu">
            <span></span>
            <span></span>
            <span></span>
        </a>
    </div>
    <div id="navigationMenu" class="navbar-menu">
        <div class="navbar-start">
            @if(auth()->user()->role_id == 2)
                <a class="navbar-item" href="/responses/create">Jätä vastaus</a>
                <a class="navbar-item" href="/responses">Omat vastaukset</a>
            @else
                <a class="navbar-item" href="/students">Omat opiskelijat</a>
                <a class="navbar-item" href="/assessments">Arvioinnit</a>
                <a class="navbar-item" href="/users">Käyttäjät</a>
                <a class="navbar-item" href="/groups">Luokat</a>
            @endif
        </div>
        <div class="navbar-end">
            <a class="navbar-item" href="/users/{{auth()->user()->id}}/edit">{{auth()->user()->email}}</a>
            <a class="navbar-item" href="/logout"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{__('Kirjaudu ulos')}}
            </a>
            <form id="logout-form" action="/logout" method="post" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</nav>

<script>
    // Toggles the "is-active" class on both the "navbar-burger" and the "navbar-menu"
    
    document.addEventListener('DOMContentLoaded', () => {
        // Get all "navbar-burger" elements
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
        
        // Check if there are any navbar burgers
        if ($navbarBurgers.length > 0) {
            
            // Add a click event on each of them
            $navbarBurgers.forEach( el => {
                el.addEventListener('click', () => {
                    
                    // Get the target from the "data-target" attribute
                    const target = el.dataset.target;
                    const $target = document.getElementById(target);
                    
                    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                    el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');
                });
            });
        }
    });
</script>
