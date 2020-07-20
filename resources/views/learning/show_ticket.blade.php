<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <style>
      p.dotted {
          border-style: dotted;
          border-color: rgb(112, 18, 1);
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
        <a href="return_page/{{$user}}">{{$user}}</a>
    </li>

        </ul>
    </nav>
</header>

    <div class="container">
        <div class ="jumbotron text-center">

            <h2><b>TICIKET LIST</b></h2>


            @foreach ($ticket as $ticket)
            <P>

          <div class="boder">
                {{-- <a  class="btn btn-outline-primary" href="{{route('Final_selection',[$ticket->id],[$user])}}">
                    Time:_{{$ticket->starting_time}}
                    Company_Id:_{{$ticket->company_id}}
                    Avaiable_Seat:_{{$ticket->available_seat}}
                    Total Seat:_{{$ticket->total_seat }}
                </a> --}}

                <a href="/Final_selection/{{$ticket->id}}/{{$user}}" title="Final_selection">
                    Time:_{{$ticket->starting_time}}
                    Company_Id:_{{$ticket->company_id}}
                    Avaiable_Seat:_{{$ticket->available_seat}}
                    Total Seat:_{{$ticket->total_seat }}
                </a>

            </p>




            @endforeach



    </div>


</body>
</html>
