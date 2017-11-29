<!doctype html>
<html>
  <head>
    <title>Great-Tours LLC</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    @stack('custom_css')
  </head>
  <body>
    <nav class="navbar navbar-light bg-faded">
      <a class="navbar-brand" href="/">Great-Tours</a>
      <ul class="navbar-nav mr-auto">
        @stack('breadcrumb')
      </ul>
    </nav>

    @yield('content')
    @stack('errors')

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @stack('javascript')

  </body>
</html>
