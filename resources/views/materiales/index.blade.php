@extends('layouts.app2')

@section("contenido")
<a href="{{route('materiales.create')}}" class="btn btn-success">+ Insertar</a>
<h1>Materiales</h1>
<table id="tabla" class="ui olive table hover" style="text-align: center;">
	<thead>
		<tr>
        <th>Nombre</th>
	    <th>Borrar</th>
		<th>Editar</th>
	</tr>
	</thead>
	<tbody>
	@foreach($materiales as $materiale)
		<tr data-id="{{$materiale->id}}">
			<td>{{$materiale->nombre}}</td>
            <td><img class='btn_borrar' width="32px" src="https://images.vexels.com/media/users/3/223479/isolated/lists/8ecc75c9d0cf6d942cce96e196d4953f-icono-de-papelera-plana.png"></td>
			<td><a href='{{"materiales/$materiale->id/edit"}}'><img class='btn_editar' width="32px" src="https://static.vecteezy.com/system/resources/previews/001/204/710/non_2x/pencil-png.png"></a></td>
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
			  title: '¿Estás seguro que quieres borrar este material?',
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
                'El material ha sido eliminado',
                'success'
                )
				$.ajax({
					method  : "POST",
					url		: "/materiales/"+id,
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