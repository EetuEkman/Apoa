@extends("layouts/layout")
@section("title", "Vastaukset")
@section("content")
    <div class="columns is-centered is-vcentered" style="padding-top: 1%">
        <div class="column is-half">
            @if(session('responded'))
                <div class="notification is-success">{{ session('responded') }}</div>
            @endif
            <section id="assessments"></section>
        </div>
    </div>

    <script src="{{ asset('js/responses.js') }}"></script>
@endsection
