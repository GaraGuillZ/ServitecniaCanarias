@extends('layouts.app2')

@section("contenido")
<a href="{{route('empleados.create')}}" class="btn btn-success">+ Insertar</a>
<h1>Empleados</h1>
<table id="tabla" style="text-align: center;">
	<thead>
		<tr>
        <th>Nombre</th>
        <th>Apellidos</th>
		<th>DNI</th>
        <th>Email</th>
		<th>Editar</th>
	</tr>
	</thead>
	<tbody>
	@foreach($empleados as $empleado)
		<tr data-id="{{$empleado->id}}">
			<td>{{$empleado->nombre}}</td>
			<td>{{$empleado->apellidos}}</td>
            <td>{{$empleado->dni}}</td>
			<td><a href="mailto:{{$empleado->email}}">{{$empleado->email}}</a></td>
			<td><a href='{{"empleados/$empleado->id/edit"}}'><img class='btn_editar' width="32px" src="https://static.vecteezy.com/system/resources/previews/001/204/710/non_2x/pencil-png.png"></a></td>
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
			  title: '¿Estás seguro que quieres borrar este empleado?',
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
                'Se ha borrado el empleado.',
                'success'
                )
				$.ajax({
					method  : "POST",
					url		: "/empleados/"+id,
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