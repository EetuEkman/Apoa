@extends("layouts/layout")
@section("title", "Vastaukset")
@section("content")
    <div class="columns is-centered is-vcentered">
        <div class="column is-half">
            <section id="assessments" style="padding-top: 1%"></section>
        </div>
    </div>

    <script src="{{ asset('js/responses.js') }}"></script>
@endsection
