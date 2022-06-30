@extends('layouts.main')

@section('content')

    @foreach ($comics as $comic)
    <br>
    <hr>

    <table class="table">
        <thead>
            <tr>
                <th class="col-1">ID</th>
                <th class="col-3">IMMAGINE</th>
                <th class="col-3">TITOLO</th>
                <th class="col-3">TIPO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>
                    <p>{{ $comic->id }}</p>
                </th>
                <td>
                    <img class="w-50 h-50" src="{{ $comic->image }}" alt="{{ $comic->title }}">
                </td>
                <td>
                    <p>{{ $comic->title }}</p>
                </td>
                <td>
                    <p>{{ $comic->type }}</p>
                </td>
                <td>
                    <a class="btn btn-success" href="{{ route('comics.show', $comic) }}">SHOW</a>
                    <a class="btn btn-primary" href="{{ route('comics.edit', $comic) }}">EDIT</a>

                    <form
                    action="{{ route('comics.destroy', $comic) }}" method="POST"
                    onsubmit="return confirm('Confermi di voler eliminare {{ $comic->title }}?')">

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">DELETE</button>

                    </form>

                </td>
            </tr>
        </tbody>
    </table>

    @endforeach

@endsection
