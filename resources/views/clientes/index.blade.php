@extends('layouts.app2')

@section("contenido")
<a href="{{route('clientes.create')}}" class="btn btn-success">+ Insertar</a>
<h1>Clientes</h1>
<table id="tabla" style="text-align: center;">
	<thead>
		<tr>
        <th>Nombre</th>
        <th>DNI/CIF</th>
        <th>Email</th>
		<th>Telefonos</th>
        <th>Dirección</th>
		<th>Persona de Contacto</th>
		<th>Editar</th>
	</tr>
	</thead>
	<tbody>
	@foreach($clientes as $cliente)
		<tr data-id="{{$cliente->id}}">
			<td>{{$cliente->nombre}} {{$cliente->apellidos}} {{$cliente->nom_empresa}}</td>
            <td>{{$cliente->dni}} {{$cliente->cif}}</td>
            <td><a href="mailto:{{$cliente->email}}">{{$cliente->email}}</a></td>
		
			<td><a href="tel:{{$cliente->movil}}"> {{$cliente->movil}} </a> <a href="tel:{{$cliente->telefono}}"> {{$cliente->telefono}}</a></td>
			<td>{{$cliente->direccion}}</td>
			<td>{{$cliente->per_contacto}}</td>
			<td><a href='{{"clientes/$cliente->id/edit"}}'><img class='btn_editar' width="32px" src="https://static.vecteezy.com/system/resources/previews/001/204/710/non_2x/pencil-png.png"></a></td>
		</tr>
		
	@endforeach
	</tbody>

</table>

<script>
	$(document).ready(function(){
		$("#tabla").DataTable({
			language: { url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json" },
            rowReorder: true,
            columnDefs: [
            { orderable: true, className: 'reorder', targets: 0 },
            { orderable: false, targets: '_all' }
            ]
		});
		

	$(".btn_borrar").click(function(){
			const $tr=$(this).closest("tr");
			const id=$tr.data("id");
			
			Swal.fire({
			  title: '¿Estás seguro que quieres borrar este cliente?',
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Borrar',
			  cancelButtonText: 'Cancelar',
			}).then((result) => {
			  if (result.isConfirmed) {	//se pulsó el botón de confirmado
                Swal.fire(
                '¡Borrado!',
                'Se ha eliminado el cliente.',
                'success'
                )
				$.ajax({
					method  : "POST",
					url		: "/clientes/"+id,
					data    : {
						_method    : 'DELETE',
						_token  : "{{csrf_token()}}", 
					},
					success : function() {
						$tr.fadeOut()
					} 

				})	  
		  }
			})
					
		});
	});
</script>

@endsection