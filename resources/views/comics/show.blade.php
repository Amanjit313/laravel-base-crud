@extends('layouts.main')

@section('content')

    <h1>{{ $comic->title }}</h1>
    <img src="{{ $comic->image }}" alt="{{ $comic->title }}">
    <p>{{ $comic->type }}</p>

    <a class="btn btn-primary" href="{{ route('comics.index') }}">BACK</a>

@endsection
