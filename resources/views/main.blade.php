<!-- View stored in resources/views/main.blade.php -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

<html>
    <body>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Guestbook</h1>
                <p class="lead">Test task.</p>
                @if (isset($errors))
                  @foreach ($errors as $message)
                      <p>{{ $message }}</p>
                  @endforeach
                @endif
                <form action="/store" method="post">
                    <div class="form-group">
                        <label for="formGroupExampleInput">User name</label>
                        <input type="text" name ="name" class="form-control" id="formGroupExampleInput" placeholder="User name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" name ="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputURL">URL address</label>
                        <input type="url" name ="url" class="form-control" id="exampleInputURL" placeholder="http://example.com">        
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" name ="message" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="col-auto my-1">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

            </form>          

            <p>List of added messages</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">User name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Date</th>
                            <th scope="col">Message</th>
                        </tr>
                    </thead>
                    <tbody>
                    <div class="list-group">
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->message }}</td>
                        </tr>
                        @endforeach
                    </div>
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </body>
</html>