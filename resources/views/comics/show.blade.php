@extends('layouts.main')

@section('content')

    <h1>{{ $comic->title }}</h1>
    <img src="{{ $comic->image }}" alt="{{ $comic->title }}">
    <p>{{ $comic->type }}</p>

    <a href="{{ route('comics.index') }}">BACK</a>

@endsection
