<navbar id="burger" class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/home">
            Apoa
        </a>
        <a class="navbar-burger" role="button" aria-label="menu" aria-expanded="false" v-on:click="toggle" v-bind:class="{'is-active': isActive}">
            <span></span>
            <span></span>
            <span></span>
        </a>
    </div>
    <div class="navbar-menu" v-bind:class="{'is-active': isActive}">
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

<script defer>
    new Vue({
        el: '#burger',
        data: {
            isActive: false
        },
        methods: {
            toggle: function() {
                console.log("clicked")
                this.isActive = !this.isActive;
            }
        }
    });
</script>