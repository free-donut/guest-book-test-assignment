<!-- View stored in resources/views/main.blade.php -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

<html>
    <body>
        <h1>Hello</h1>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Fluid jumbotron</h1>
                <p class="lead">Это модифицированный jumbotron, который занимает все горизонтальное пространство своего родителя.</p>
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
            </div>
        </div>
    </body>
</html>