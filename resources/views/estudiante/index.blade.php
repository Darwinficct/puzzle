<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <title>Importar</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <header>
        <div class="menu">
          <div class="nombre">Referéndum UAGRM 2022</div>
          <nav>
              
          </nav>
        </div>
      </header><br>
      <div class="fondo"><br>
     <div id="kt_content" class="content d-flex flex-column flex-column-fluid mt-0 pt-0">
         <div class="post d-flex flex-column-fluid" id="kt_post">
             <div class="container-xxl container-xl container-lg">
                 <div class="row mt-20 justify-content-center">
                     <div class="col-xxl-6">
                         <div class="card mb-5 mb-xl-8 card-bordered border-gray-300" style="border-top: 5px solid rgb(245, 244, 244) !important;">
                            <form action="{{ route('estudiante.index') }}" method="get">
                            <div class="card-header mb-5">
                                <div class="row pt-5 pb-5 w-100">
                                    <div class="col-12 mt-3 col-xl-9 col-lg-9 col-xxl-9">
                                        <input type="number" class="form-control" placeholder="Registro" name="texto" value="{{$texto}}">
                                    </div><div class="col-12 mt-3 col-xl-3 col-lg-3 col-xxl-3">
                                        <button id="botonBuscar" class="btn btn-danger w-100" style="color: rgb(255, 255, 255); border-color: rgb(183, 28, 28); background-color: rgb(183, 28, 28) !important;">
                                            <span class="indicator-label">Buscar</span>
                                            
                                                </span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </form>
                            @foreach ($datos as $dato )
                                
                            <div class="card-body mb-5">
                                <div style="">
                                    <div class="row pb-2 w-100">
                                        <div class="col-xxl-4">
                                        <span class="fs-4 fw-bolder">Registro:</span>
                                    </div>
                                    <div class="col-xxl-8">
                                        <span class="fs-4">{{$dato->Registro}}</span>
                                    </div>
                                </div>
                                <div class="row pb-2 w-100">
                                    <div class="col-xxl-4">
                                        <span class="fs-4 fw-bolder">Nombre:</span>
                                    </div><div class="col-xxl-8">
                                        <span class="fs-4">{{$dato->Nombre}}</span>
                                    </div>
                                </div>
                                <div class="row pb-2 w-100">
                                    <div class="col-xxl-4">
                                        <span class="fs-4 fw-bolder">Facultad:</span>
                                    </div>
                                    <div class="col-xxl-8">
                                        <span class="fs-4">{{$dato->FACULTAD}}</span>
                                    </div>
                                </div>
                                <div class="row pb-2 w-100">
                                    <div class="col-xxl-4">
                                        <span class="fs-4 fw-bolder">Carrera:</span>
                                    </div>
                                    <div class="col-xxl-8">
                                        <span class="fs-4">{{$dato->CARRERA_NOMBRE}}</span>
                                    </div>
                                </div>
                                <div class="row pb-2 w-100">
                                    <div class="col-xxl-4">
                                        <span class="fs-4 fw-bolder">Lugar:</span>
                                    </div><div class="col-xxl-8">
                                        <span class="fs-4">{{$dato->LUGAR_VOTACION}}</span>
                                    </div>
                                </div>
                                <div class="row pb-2 w-100">
                                    <div class="col-xxl-4">
                                        <span class="fs-4 fw-bolder">Mesa:</span>
                                    </div><div class="col-xxl-8">
                                        <span class="fs-4">{{$dato->MESA}}</span>
                                    </div>
                                </div>
                                
                            </div>
                            @endforeach
                            
                            <div class="row pt-5 pb-0 w-100" style="">
                                <div class="col-xxl-12">
                                    <img src="/img/alex.jpeg" class="w-100 rounded">
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
    
        
           
             
        
    
</body>
</html>