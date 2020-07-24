<h1>Toto vous répond !</h1>

Il est {{ $date }}. Une question peut-être ?

@if (isset($nombre))
    <p>{{ $nombre }}</p>
@endif

<hr/>

<a href="{{ route('toto') }}">Retour vers l'accueil toto.</a>