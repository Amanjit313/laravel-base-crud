@extends('layouts.main')

@section('content')

    <h2>Aperta pagina per creare un comic</h2>

    <form action=" {{ route('comics.store') }} " method="POST">
        @csrf

        <div class="col-4">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" id="title"
                name="title"
                class="form-control" placeholder="Titolo">
        </div>

        <div class="col-4">
            <label for="image" class="form-label">Image</label>
            <input type="text" id="image"
                name="image"
                class="form-control" placeholder="Image">
        </div>

        <div class="col-4">
            <label for="type" class="form-label">Type</label>
            <input type="text" id="type"
                name="type"
                class="form-control" placeholder="Type">
        </div>

        <button type="submit" class="btn btn-success">INVIA</button>
    </form>

    <a class="btn btn-primary" href="{{ route('comics.index') }}">BACK</a>

@endsection
