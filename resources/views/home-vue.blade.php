@extends('layouts.default')

@section('content')
  <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4" id="app">

      <h1>URL Shortener</h1>
      <p>
        A url shortener for urls that are overly complex, poorly scoped, or simply micro-managed to hell. Convert that url to a simple implementation of what needs to get done.
      </p>
        <url-shortner></url-shortner>

    </div>
    <div class="col-md-4">
    </div>
  </div>
  <script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
    ]); ?>
  </script>
@endsection
