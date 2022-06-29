@extends('layouts.main')

@section('content')

    @foreach ($comics as $comic)
    <br>
    <hr>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>IMMAGINE</th>
                <th>TITOLO</th>
                <th>TIPO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <p>{{ $comic->id }}</p>
                </td>
                <td>
                    <img src="{{ $comic->image }}" alt="{{ $comic->title }}">
                </td>
                <td>
                    <p>{{ $comic->title }}</p>
                </td>
                <td>
                    <p>{{ $comic->type }}</p>
                </td>
                <td>
                    <a href="{{ route('comics.show', $comic) }}">SHOW</a>
                </td>
            </tr>
        </tbody>
    </table>

    @endforeach

@endsection
