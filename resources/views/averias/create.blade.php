@extends("layouts.app3")
@section("contenido")
	<h3>Formulario para @if (isset($averia)) actualizar @else insertar @endif</h3>
<form method="POST" action="{{isset($averia)?route("averias.update",[$averia->id]):route("averias.store")}}">
  <div class="form-group">
    <label for="codigo">Descripcion</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion"  value='{{$averia->descripcion??''}}'>
  </div>
  <div class="form-group">
    <label for="codigo">Fecha de Alta</label>
    <input type="date" class="form-control" id="f_alta" name="f_alta"  value='{{$averia->f_alta??''}}'>
    </div>
    <div class="form-group">
    <label for="codigo">Fecha de Realización</label>
    <input type="date" class="form-control" id="f_realizacion" name="f_realizacion"  value='{{$averia->f_realizacion??''}}'>
    </div> 
    <div class="form-group">
    <label for="codigo">Realizada</label>
    <input type="checkbox" name="estado" class="switch-input" value="1" {{ old('estado') ? 'checked="checked"' : '' }}/>
  </div>
  <div class="form-group">
    <label for="codigo">Facturado</label>
    <input type="checkbox" name="facturado" class="switch-input" value="1" {{ old('facturado') ? 'checked="checked"' : '' }}/>
  </div>
  <div class="form-group">
    <label for="codigo">Observaciones</label>
    <input type="text" class="form-control" id="observaciones" name="observaciones"  value='{{$averia->observaciones??''}}'>
  </div>

  <div class="form-group">
    <label for="codigo">Empleado</label>
    <select name="empleado_id" id="input" class="form-control">
      <option value="">--Escoja el empleado--</option>

    @foreach($empleados as $empleado)
      <option value="{{ $empleado ['id' ] }}" @if (isset($averia)) {{$averia->empleado_id==$empleado->id?'selected':''}}@endif>{{ $empleado['nombre'] }} {{$empleado['apellidos']}} </option>
      @endforeach
    </select>
  </div>

  
    <div class="form-group">
    <label for="codigo">Cliente</label>
    <select name="cliente_id" id="input" class="form-control">
      <option value="">--Escoja el cliente--</option>

    @foreach($clientes as $cliente)
    <option value="{{ $cliente ['id' ] }}" @if (isset($averia)) {{$averia->cliente_id==$cliente->id?'selected':''}}@endif>{{ $cliente['nombre'] }} {{ $cliente['apellidos'] }} {{ $cliente['nom_empresa'] }} </option>
      @endforeach
    </select>
  </div>

  
	
	@csrf
	
	@if (isset($averia))
		<input type="hidden" name="_method" value="PUT">
	@endif
  <button type="submit" class="btn btn-primary">{{isset($averia)? 'Actualizar':'Insertar'}}</button>
  <a href="{{route('averias.index')}}" class="btn btn-secondary">Volver</a>
</form>


@endsection