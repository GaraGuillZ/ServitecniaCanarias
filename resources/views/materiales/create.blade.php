@extends("layouts.app3")


@section("contenido")

	<h3>Formulario para @if (isset($materiale)) actualizar @else insertar @endif</h3>

    

<form method="POST" action="{{isset($materiale)?route("materiales.update",[$materiale->id]):route("materiales.store")}}">
  <div class="form-group">
    <label for="codigo">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre"  value='{{$materiale->nombre??''}}'>
  </div>
	
	@csrf
	
	@if (isset($materiale))
		<input type="hidden" name="_method" value="PUT">
	@endif
  <button type="submit" class="btn btn-primary">{{isset($materiale)? 'Actualizar':'Insertar'}}</button>
  <a href="{{route('materiales.index')}}" class="btn btn-secondary">Volver</a>
</form>


@endsection