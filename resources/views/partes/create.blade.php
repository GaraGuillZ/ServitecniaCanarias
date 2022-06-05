@extends("layouts.app3")

@section("contenido")
	<h3>Formulario para @if (isset($parte)) actualizar @else insertar @endif</h3>
<form method="POST" enctype="multipart/form-data"  action="{{isset($parte)?route("partes.update",[$parte->id]):route("partes.store")}}">
  <div class="form-group">
    <label for="codigo">Numero de parte</label>
    <input type="text" class="form-control" id="n_parte" name="n_parte"  value='{{$parte->n_parte??''}}'>
  </div>
  <div class="form-group">
    <label for="codigo">Descripción</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion"  value='{{$parte->descripcion??''}}'>
  </div>
  <div class="form-group">
    <label for="codigo">Trabajos realizados</label>
    <input type="text" class="form-control" id="trabajos_realizados" name="trabajos_realizados"  value='{{$parte->trabajos_realizados??''}}'>
  </div>
  <div class="form-group">
    <label for="codigo">Fecha </label>
    <input type="date" class="form-control" id="f_inicio" name="f_inicio"  value='{{$parte->f_inicio??''}}'>
    </div>
    
  <div class="form-group">
    <label for="codigo">Observaciones</label>
    <input type="text" class="form-control" id="observaciones" name="observaciones"  value='{{$parte->observaciones??''}}'>
  </div>
  
  <div class="form-group">
    <label for="codigo">Mano de Obra</label>
    <input type="text" class="form-control" id="mano_de_obra" name="mano_de_obra"  value='{{$parte->mano_de_obra??''}}'>
  </div>
 


  <div class="form-group">
    <label for="codigo"> Firma del profesional</label>
    <select name="empleado_id" id="input" class="form-control">
      <option value="">--Escoja el empleado--</option>
  
    @foreach($empleados as $empleado)
      <option value="{{ $empleado ['id' ] }}" @if (isset($parte)) {{$parte->empleado_id==$empleado->id?'selected':''}}@endif>{{ $empleado['nombre'] }} {{$empleado['apellidos']}} </option>
      @endforeach
    </select>
  </div>

  
    <div class="form-group">
    <label for="codigo">Firma del cliente</label>
    <select name="cliente_id" id="input" class="form-control">
      <option value="">--Escoja el cliente--</option>

    @foreach($clientes as $cliente)
    <option value="{{ $cliente ['id' ] }}" @if (isset($parte)) {{$parte->cliente_id==$cliente->id?'selected':''}}@endif>{{ $cliente['nombre'] }} {{ $cliente['apellidos'] }} {{ $cliente['nom_empresa'] }} </option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="codigo">Imagen</label>
    <input type="file" name="imagen" id="" accept="image/*">
  </div>
  
  <div class="form-group">
    <label for="codigo">Adjuntar albarán</label>
    <input type="file" name="albaran" id="" accept="image/*">
  </div>
	
  

	@csrf
	
	@if (isset($parte))
		<input type="hidden" name="_method" value="PUT">
	@endif
  <button type="submit" class="btn btn-primary">{{isset($parte)? 'Actualizar':'Insertar'}}</button>
  <a href="{{route('partes.index')}}" class="btn btn-secondary">Volver</a>
</form>

<script>
  $(document).ready(function() {
    $('.materiales').select2();
    });
  </script>

@endsection
