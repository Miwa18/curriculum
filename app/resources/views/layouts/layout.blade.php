<!DOCTYPE html>
<html lang="{{str_replace('_','-',app()->getLocale())}}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>shift</title>
    <!--jquery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- MDB icon -->
    <link rel="icon" href="{{asset('img/mdb-favicon.ico')}}" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <link rel="stylesheet" href="{{asset('/css/my.css')}}"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}" />
  </head>
  <body>
    <!-- Start your project here-->
    @if(session('flash'))
      @foreach(session('flash') as $key => $item)
        <div class="alert alert-{{$key}}">
          {{session('flash.'.$key)}}
        </div>
      @endforeach
    @endif
    
    @yield('content')
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
    <!-- Ajax -->
    <script type="text/javascript" src="{{asset('js/ajax.js')}}" >
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>
