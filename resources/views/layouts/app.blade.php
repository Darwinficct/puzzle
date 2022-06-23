<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Laravel App</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/trontastic/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <script src="https://cdn.socket.io/4.5.0/socket.io.min.js"
         integrity="sha384-7EyYLQZgWBi67fBtVxw60/OWl1kjsfrPFcaU0pp0nAh+i8FD068QogUvg85Ewy1k"
         crossorigin="anonymous"></script>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
        
</head>
<body>
  
  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand" href="index">   </a>
    <a class="navbar-brand" href="index">Puzzle SW1</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active"><a class="nav-link" href="#"></a></li>
        <li class="nav-item"><a class="nav-link" href="#"></a></li>
        <li class="nav-item"><a id="save" class="nav-link">Guardar</a></li>
        <li class="nav-item"><a id="abrir" class="nav-link">Abrir</a></li>
   </ul>
  
   <ul class="nav navbar-nav my-2 my-lg-0">
     @if(auth()->check())
       
        <li class="nav-item">
          <a class="nav-link">
            <i class="fas fa-user"></i>{{ auth()->user()->name }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('login.destroy')}}">
            <i class="fas fa-sign-in-alt">
              </i>Cerrar Session</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{route('login.index')}}">
            <i class="fas fa-user">
              </i> Login </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('register.index')}}">
            <i class="fas fa-sign-in-alt">
              </i> Registro</a>
        </li>

        @endif
   </ul>
  </nav>

    @yield('content')
    
  
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>