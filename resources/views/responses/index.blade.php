@extends("layouts/layout")
@section("title", "Vastaukset")
@section("content")
    <div class="columns is-centered is-vcentered">
        <div class="column is-half">
            <section id="assessments"></section>
        </div>
    </div>

    <script src="{{ asset('js/StudentResponses.js') }}"></script>
@endsection
