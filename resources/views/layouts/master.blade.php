<!-- Stored in resources/views/layouts/master.blade.php -->
<html>
  <head>
    <title>@yield('title')</title>
  </head>
  <body>
    <div class="jumbotron">
      @section('master')
        <h1 class="display-4">Guestbook</h1>
        <p class="lead">Test task.</p>
        @if (isset($errors))
          @foreach ($errors as $message)
            <div class="alert alert-warning" role="alert">
              {{ $message }}
            </div>
          @endforeach
        @endif
        <form action="{{ route('guestbook.store') }}" method="post">
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
            <label for="exampleFormControlTextarea1">Message</label>
            <textarea class="form-control" name ="message" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <div class="col-auto my-1">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      @show
      <div class="jumbotron jumbotron-fluid">
        @yield('content')
      </div>
    </div>
  </body>
</html>