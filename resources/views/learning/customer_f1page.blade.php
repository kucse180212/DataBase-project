<?php
session_start();
// if(!isset(_session[username]))
// {
// 	header('location:login.php');

//echo $_session["username"];
// }

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>One Page Wonder - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/one-page-wonder.min.css" rel="stylesheet">

</head>
<body>

<!-- <div class="container-fluid p-0">
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="#" aling='left'></a>
    </li>
    <li class="nav-item">

    </li>
  </ul>
</nav>

</div> -->

<nav class="navbar navbar-expand-sm bg-mute navbar-dark">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a herf=""> {{$user->email}}</a>
  <a href="/TBS">Log Out</a>



        </li>
    </ul>
  </nav>




  <header class="masthead text-center text-white">
    <div class="masthead-content">
      <div class="container">
        <h1 class="masthead-heading mb-0">WELCOME TO ONLINE</h1>
        <h2 class="masthead-subheading mb-0">TICKET BOOKING SYSTEM</h2>
        <a href="Aboutmiddleus.php" class="btn btn-primary btn-xl rounded-pill mt-5">Learn More</a>
      </div>
    </div>
  </header>

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2">
          <div class="p-5">
            <img class="img-fluid rounded-circle" src="img/01.jpg" alt="Cinque Terre">
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="p-5">
            <h4 class="display-6">CLick below to see the Bus Company We are serving..</h4>
            <a href="Companymiddle.php" class="btn btn-dark btn-xl rounded-pill mt-5">Click here</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="p-5">
             <img src="img/02.jpg" class="img-fluid rounded " alt="Cinque Terre">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="p-5">
            <h2 class="display-4">Click below to see the Area we cover</h2>
            <a href="googlemap" class="btn btn-success btn-xl rounded-pill mt-5">Click here</a>


          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2">
          <div class="p-5">
            <img class="img-fluid rounded" src="img/03.jpg" alt="Cinque Terre">
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="p-5">
            <h2 class="display-4">Click below to buy tickets</h2>

            <a href="{{route ( 'place', [$user->email])}}" class="btn btn-primary btn-xl rounded-pill mt-5">{{$user->email}}</a>


          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 bg-black">
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>






</body>
</html>
