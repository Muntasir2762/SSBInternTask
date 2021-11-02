
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Bracket Plus Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="{{asset('Backend/lib/@fortawesome/fontawesome-free/css/all.min.css')}} " rel="stylesheet">
    <link href="{{asset('Backend/lib/ionicons/css/ionicons.min.css')}} " rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{asset('Backend/css/bracket.css')}}">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> bracket <span class="tx-info">plus</span> <span class="tx-normal">]</span></div>
        <div class="tx-center mg-b-60">The Admin Template For Perfectionist</div>


        @yield('content')
       <!--  <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter your username">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Enter your password">
          <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
        </div>
        <button type="submit" class="btn btn-info btn-block">Sign In</button> -->

       
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="{{asset('Backend/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('Backend/lib/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <script src="{{asset('Backend/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  </body>
</html>
