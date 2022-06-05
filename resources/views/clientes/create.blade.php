@extends("layouts.app3")

@section("contenido")

	<h3>Formulario para @if (isset($cliente)) actualizar @else insertar @endif</h3>

<form method="POST" action="{{isset($cliente)?route("clientes.update",[$cliente->id]):route("clientes.store")}}">
  <div class="form-group">
    <label for="codigo">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre"  value='{{$cliente->nombre??''}}'>
  </div>

  <div class="form-group">
    <label for="codigo">Apellido </label>
    <input type="text" class="form-control" id="apellidos" name="apellidos"  value='{{$cliente->apellidos??''}}'>
  </div>

  <div class="form-group">
    <label for="codigo">Nombre empresa</label>
    <input type="text" class="form-control" id="nom_empresa" name="nom_empresa"  value='{{$cliente->nom_empresa??''}}'>
  </div>


  <div class="form-group">
    <label for="codigo">DNI</label>
    <input type="text" class="form-control" id="dni" name="dni"  value='{{$cliente->dni??''}}'>
    </div>

    <div class="form-group">
    <label for="codigo">CIF</label>
    <input type="text" class="form-control" id="cif" name="cif"  value='{{$cliente->cif??''}}'>
    </div>
  <div class="form-group">
    <label for="codigo">Email</label>
    <input type="text" class="form-control" id="email" name="email"  value='{{$cliente->email??''}}'>
    </div>
    <div class="form-group">
    <label for="codigo">Teléfono</label>
    <input type="text" class="form-control" id="telefono" name="telefono"  value='{{$cliente->telefono??''}}'>
    </div>
    <div class="form-group">
    <label for="codigo">Móvil</label>
    <input type="text" class="form-control" id="movil" name="movil"  value='{{$cliente->movil??''}}'>
    </div>
    <div class="form-group">
    <label for="codigo">Dirección</label>
    <input type="text" class="form-control" id="direccion" name="direccion"  value='{{$cliente->direccion??''}}'>
    </div>
 
    <div class="form-group">
    <label for="codigo">Persona de Contacto</label>
    <input type="text" class="form-control" id="per_contacto" name="per_contacto"  value='{{$cliente->per_contacto??''}}'>
    </div>

	
	@csrf
	
	@if (isset($cliente))
		<input type="hidden" name="_method" value="PUT">
	@endif
  <button type="submit" class="btn btn-primary">{{isset($cliente)? 'Actualizar':'Insertar'}}</button>
  <a href="{{route('clientes.index')}}" class="btn btn-secondary">Volver</a>
</form>


@endsection