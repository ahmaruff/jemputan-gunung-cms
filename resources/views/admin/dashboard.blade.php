@extends('admin.layouts.base')

@section('content')
    <h1>hola {{ $nama }}</h1>
    <p>{{ $email }}</p>

    <a href="/logout">Log out</a>
@endsection