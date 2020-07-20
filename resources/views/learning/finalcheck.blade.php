<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


  <style>
      .al{
          align-items: center;

      }
      .abcde
      {
          margin-left:40%
      }
  </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-muted navbar-dark">
    <!-- Brand -->

    <ul class="navbar-nav ml-auto">

            <li class="navbar-nav ml -center">
                <a href="/TBS">Log Out</a>
            </li>
            <li class="navbar-nav ml -center">
                <a href="returnpage/{{$user}}">{{$user}}</a>
    </li>

        </ul>
    </nav>
</header>
<div class="container">
    <div class ="jumbotron text-center">


        <h2><b>Check the tickets</b></h2>

    <div class="abcde">
        <table border="1">
            <tr>
                <td>Seat_number</td>
                <td>price</td>
            </tr>
        @foreach ($seat as $seat)
        <P>
            <tr>
                <td>{{$seat->seat_number}}</td>
                <td>{{$seat->price}}</td>
            </tr>

        </p>
        @endforeach

    </table>
</div>
        <div class="al">
            <h2><b>Click to buy the tickets</b></h2>

        <form action="/confirm_tickets/{{$user}}/{{$seat->id?? ''}}" method="POST">
            @csrf
            <div class="al">
                <input class="input--style-8" type="number" placeholder="Number of Tickets" name="N_O_T">
            </div>
            <div class="p-t-10">
                <button class="btn btn-outline-primary" type="submit">click to confirm</button>
            </div>
        </form>
        </div>

    </div>

</div>

</body>
</html>
