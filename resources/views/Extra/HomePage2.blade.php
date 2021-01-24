<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Style CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css')}}">
  <!-- Bootstrap 5 CSS -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
  <title>Home Page</title>
</head>
<body>


    <!-- Navigation Part -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Resulsect</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/results">Results</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/contact">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li>
              <li class="nav-item d-none d-sm-inline-block">
                <a href="/Dashboard" class="nav-link"><b><i class="fas fa-sign-in-alt"></i> Login</b></a>
              </li>
            </ul>
            <span class="navbar-text">
                Welcome to Resulsect.
            </span>
          </div>
        </div>
      </nav>



    <!-- Table Part -->
    <div class="card">
        <p class="card-header"><b> Home/</b></p>
    </div>
    <br>
      <div class="container">
          <div class="jumbotrom">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">All class details..</h5>

                  <p>Home Cpmponents</p>

                </div>
            </div>
          </div>
      </div>


<!-- script link part start -->
<!-- propper js -->
<script src="{{ asset('js/propper.min.js')}}"></script>
<!-- Bootstarap 5 JS -->
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<!-- script link part end -->


</body>
</html>