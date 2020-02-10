<!-- Stored in resources/views/main.blade.php -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@extends('layouts.master')

@section('title', 'Main page')

@section('master')
    @parent
@endsection

@section('content')
<p>List of added messages</p>
    <table class="table table-striped">
        <thead>
            <tr>
                @foreach ($sortLinksData as $link)
                    <th scope="col">
                        <a href="{{ $link['href'] }} ">{{ $link['name'] }}</a>
                    </th>
                @endforeach
                <th scope="col">Homepage</th>
                <th scope="col">User agent info</th>
                <th scope="col">IP adress</th>
                <th scope="col">Message</th>
                <th scope="col">To JSON</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->url }}</td>
                <td>{{ $user->browser }}</td>
                <td>{{ $user->ip }}</td>
                <td>{{ $user->message }}</td>
                <td><a href="/{{ $user->id }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Click</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
{{ $users->appends(['column' => $column, 'order' => $order])->links() }}
@endsection
