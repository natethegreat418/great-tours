<!doctype html>
<html>
<head>
  <title>Great Tours LLC</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link rel="stylesheet" href={{ URL::asset("css/master.css") }} >

  @stack('custom_css')
</head>
<body>
  <nav class="nav mainnav navbar-light bg-faded">
    <a class="navbar-brand" href="/">Great Tours</a>
    <a class="nav-link" href="/trips/explore">All Trips</a>
    @stack('breadcrumb')
  </nav>

  @yield('content')
  @stack('errors')

  <!-- Jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  @stack('javascript')

</body>
</html>
