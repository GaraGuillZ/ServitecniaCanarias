@extends("layouts.app3")

@section("contenido")

	<h3>Formulario para @if (isset($empleado)) actualizar @else insertar @endif</h3>

<form method="POST" action="{{isset($empleado)?route("empleados.update",[$empleado->id]):route("empleados.store")}}">
  <div class="form-group">
    <label for="codigo">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre"  value='{{$empleado->nombre??''}}'>
  </div>
  <div class="form-group">
    <label for="codigo">Apellido </label>
    <input type="text" class="form-control" id="apellidos" name="apellidos"  value='{{$empleado->apellidos??''}}'>
  </div>
  <div class="form-group">
    <label for="codigo">Email</label>
    <input type="text" class="form-control" id="email" name="email"  value='{{$empleado->email??''}}'>
    </div>
    <div class="form-group">
    <label for="codigo">DNI</label>
    <input type="text" class="form-control" id="dni" name="dni"  value='{{$empleado->dni??''}}'>
    </div>
  
	
	@csrf
	
	@if (isset($empleado))
		<input type="hidden" name="_method" value="PUT">
	@endif
  <button type="submit" class="btn btn-primary">{{isset($empleado)? 'Actualizar':'Insertar'}}</button>
  <a href="{{route('empleados.index')}}" class="btn btn-secondary">Volver</a>
</form>


@endsection