@extends('layouts.app')

@section('title', 'Login')

@section('content')
<section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
  
              <h3 class="mb-5">Bienvenido</h3>
              <form class="mt-4" method="POST" action="{{url('/login')}}">
                @csrf  
                
                <div class="form-outline mb-4">
                <input type="email" id="email" name="email" placeholder="Email" class="form-control form-control-lg" />
                <label class="form-label" for="typeEmailX-2">Correo</label>
              </div>
            
              <div class="form-outline mb-4">
                <input type="password" id="password" name="password" placeholder="Password" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX-2">Contraseña</label>
              </div>
              @error('message')
              <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">*{{$message}}</p>
              @enderror
              <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
              type="submit"><i class="fab fa-google me-2"></i>Iniciar Sesión</button>
  
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection