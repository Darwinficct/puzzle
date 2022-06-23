@extends('layouts.app')

@section('title','Home')

@section('content')




<div id="caja">
<div id="container">
    <div id="pieceContainer"></div>
    <div id="puzzleContainer"></div>
    <ul id="buttons">
        <li><button id="btnStart">Start</button></li>
        <li><button id="btnReset">Reset</button></li>
    </ul>
</div>
<div id="conta">
    <h1>Tablero de puntuaciones</h1>
    <br>
    <form action="{{url('/puntos')}}" method="post">
        @csrf
        <div class="form-group row">
            <label for="email_address" class="col-md-4 col-form-label text-md-right">Aciertos</label>
            <div class="col-md-6">
                <input type="number" id="acierto" class="form-control" name="acierto" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="acierto" class="col-md-4 col-form-label text-md-right">Errores</label>
            <div class="col-md-6">
                <input type="number" id="fallo" class="form-control" name="fallo" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="acierto" class="col-md-4 col-form-label text-md-right">Parida</label>
            <div class="col-md-6">
                <input type="text" id="partida_name" class="form-control" name="partida_name">
            </div>
        </div>
        <br>
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Register
            </button>
            
        </div>
        <div class="table-responsive">
            <table class="table">
                {{--Cabecera de Tabla--}}
                <thead class="text-primary text-success">
                <th>Jugador</th>
                <th>Partida</th>
                <th>Acierto</th>
                <th>Fallos</th>
                
                </thead>
                <tbody>
                    @foreach($puntos as $punto)
                    <tr>
                        <td>{{ $punto->user_name}}</td>
                        <td>{{ $punto->partida_name}}</td>
                        <td>{{ $punto->acierto}}</td>
                        <td>{{ $punto->fallo}}</td>
                        <td class="td-actions text-right">
                            
                            
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
</div>
</form>
</div>
</div>




@endsection