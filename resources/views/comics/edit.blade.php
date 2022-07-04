@extends('layouts.main')

@section('content')

    <div class="row">

        @if($errors->any())
        <div class="alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

    </div>

    <h2>Aperta pagina per le modifiche del comic: {{ $comic->title }}</h2>

    <form action=" {{ route('comics.update', $comic) }} " method="POST">
        @csrf
        @method('PUT')

        <div class="col-4">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" id="title"
                name="title"
                value="{{ old('title', $comic->title)}}"
                class="form-control @error('title') is-invalid @enderror" placeholder="Titolo">
                @error('title')
                    <p class="error-msg text-danger">{{ $message }}</p>
                @enderror
        </div>

        <div class="col-4">
            <label for="image" class="form-label">Image</label>
            <input type="text" id="image"
                name="image"
                value="{{ old('image', $comic->image) }}"
                class="form-control @error('image') is-invalid @enderror" placeholder="Image">
                @error('image')
                    <p class="error-msg text-danger">{{ $message }}</p>
                @enderror
        </div>

        <div class="col-4">
            <label for="type" class="form-label">Type</label>
            <input type="text" id="type"
                name="type"
                value="{{ old('type', $comic->type)}}"
                class="form-control" placeholder="Type">
                @error('type')
                    <p class="error-msg text-danger">{{ $message }}</p>
                @enderror
        </div>

        <button type="submit" class="btn btn-success">INVIA</button>
    </form>

    <a class="btn btn-primary" href="{{ route('comics.index') }}">BACK</a>

@endsection
