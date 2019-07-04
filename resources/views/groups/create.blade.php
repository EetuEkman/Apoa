@extends("layouts/layout")

@section("title", "Luo luokka")

@section("content")
    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/groups" method="post">
        @csrf
        <label for="name">Nimi</label><br>
        <input type="text" name="name" value="{{ old('name') }}" tabindex="1"><br>
        <label for="description">Kuvaus</label><br>
        <input type="text" name="description" value="{{ old('description') }}" tabindex="2"><br>
        <label for="year">Aloitusvuosi</label><br>
        <input type="text" name="year" value="{{ old('year') }}" tabindex="3"><br>
        <label for="semester">Lukukausi, syksy/kevät</label><br>
        <input type="text" name="semester" value="{{ old('semester') }}" tabindex="4"><br>
        <input type="submit" value="Ok">    
    </form>

    <button onclick="window.location.href='/groups'">Peruuta</button>
@endsection
