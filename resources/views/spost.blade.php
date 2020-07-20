<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ticket Booking System</title>

        <!-- Fonts -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-image:url('https://lh3.googleusercontent.com/proxy/xOMiat0_z2VSJ2wpfEcPofBXACmj7Zta3I3Jp7VxLx_HCCQSnHOX3cXj9NHc3dvq_QdMhyNrl_1Al5dQh_BmyAH0bIdQ2Zf1R2DDLhNEE9I951rjbAgVJXHnlqZLB9-u5k88htB_B6w2laQz1Wi8W3SqVLDqZ3m0VKdgN5Ft2UzTtMwpckFad4mlVUo6');
                background-size: cover;
                background-repeat: no-repeat;
                 height: 100%;
                font-family: 'Numans', sans-serif;

            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                font-weight: bold;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
                color: white;
            }
            .emon{


                text-align: center;
                background: black;
                font-weight: bold;
                border-top: 2cm;
                height: 10%;

                align-content: center;

                margin-top: auto;
                margin-bottom: auto;
                width: 400px;
                margin-left: 550px;


            }
            .lmon{
                text-align: center;
                background: pink;
                font-weight: bold;
                border-top: 2cm;
                height: 20%;

                align: center;
                margin-left: 550px;

                margin-top: auto;
                margin-bottom: auto;
                width: 400px;






            }


              </style>
    </head>
    <body>

            <div class="content">

                <div class="title m-b-md">
                    Welcome to Ticket Booking System
                </div>
                <div class ="emon">
                    <a href="{{ url('/TBS') }}">Log in</a>
               </div>

               <div class ="lmon">
                <a href="{{ url('/signup') }}">Sign Up as Admin</a>
               </div>
               <div class ="lmon">
                <a href="{{ url('/signup') }}">Sign Up as Customer</a>
               </div>

            </div>


        </div>
    </body>
</html>
