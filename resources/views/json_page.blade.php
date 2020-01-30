<!-- Stored in resources/views/main.blade.php -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@extends('layouts.master')

@section('title', 'Page Title')

@section('master')
    @parent
@endsection

@section('content')
<p>JSON data</p>

<p>{{ $userToJson }}</p>

<a href="/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Return</a>

@endsection
