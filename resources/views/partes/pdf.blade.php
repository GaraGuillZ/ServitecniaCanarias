<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<table id="tabla" class="table table-striped table-bordered">
	<thead>
		<tr><th>Nº Parte</th><th>Descripción</th><th>Fecha</th><th>Trabajos Realizados</th><th>Mano de obra</th><th>Cliente</th><th>Empleado</th></tr>
	</thead>
	<tbody>
	@foreach($partes as $parte)
		<tr data-id="{{$parte->id}}">
			<td>{{$parte->n_parte}}</td>
            <td>{{$parte->descripcion}}</td>
            <td>{{date('d-m-Y', strtotime($parte->f_inicio))}}</td>
            <td>{{$parte->trabajos_realizados}}</td>
			<td>{{$parte->mano_de_obra}}</td>
			<td>{{$parte->cliente->nombre}} {{$parte->cliente->apellidos}} {{$parte->cliente->nom_empresa}}</td>
			<td  >{{$parte->empleado->nombre}} {{$parte->empleado->apellidos}} </td>
		</tr>	
	@endforeach
	</tbody>
</table>

