
@extends('layouts.app')

@section('title', 'Register')

@section('content')
    
<section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
  
              <h3 class="mb-5">Registro</h3>
              <form class="mt-4" method="POST" action="{{url('/register')}}">
                @csrf
                
                <div class="form-outline mb-4">
                    <input type="text" id="name" name="name" placeholder="Name" class="form-control form-control-lg" />
                    <label class="form-label" for="typeEmailX-2">Nombre</label>
                </div>
                @error('name')
                <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">*{{$message}}</p>
                @enderror
                <div class="form-outline mb-4">
                <input type="email" id="email" name="email" placeholder="Email" class="form-control form-control-lg" />
                <label class="form-label" for="typeEmailX-2">Correo</label>
              </div>
              @error('email')
              <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">*{{$message}}</p>
              @enderror
              <div class="form-outline mb-4">
                <input type="password" id="password" name="password" placeholder="Password" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX-2">Contraseña</label>
              </div>
              @error('password')
              <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">*{{$message}}</p>
              @enderror
              <div class="form-outline mb-4">
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Password confirmation" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX-2">Confirmar contraseña</label>
              </div>
              @error('password')
              <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">*{{$message}}</p>
              @enderror
              <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
              type="submit"><i class="fab fa-google me-2"></i>Registrarse</button>
  
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection