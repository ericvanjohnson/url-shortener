@extends('layouts.default')

@section('content')
  <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">

      <h1>URL Shortner</h1>
      <p>
        A url shortener for urls that are overly complex, poorly scoped, or simply micro-managed to hell. Convert that url to a simple implementation of what needs to get done.
      </p>
      <p>
      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        </p>
      <p>
        <form class="form-inline" method="post">
          {{ csrf_field() }}
        <div class="form-group">
          <input type="text" size="45" name="url" placeholder="Add a URL you would like to shorten" required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-default btn-block" > Submit</button>
        </div>
      </form>
    </p>

    </div>
    <div class="col-md-4">
    </div>
  </div>
@endsection
