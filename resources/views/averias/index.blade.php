@extends('layouts.app2')

@section("contenido")
<a href="{{route('averias.create')}}" class="btn btn-success">+ Insertar</a>
<h1>Averias</h1>
<table id="tabla" style="text-align: center;">
	<thead>
		<tr>
        <th>Descripcion</th>
		<th>Fecha de alta</th>
        <th>Fecha de realizacion</th>
		<th>Observaciones</th>
        <th>Empleado</th>
        <th>Cliente</th>
		<th>Estado</th>
		<th>Facturación</th> 
		<th>Parte</th>

        <!-- <th>Borrar</th> -->
		<th>Editar</th>
	</tr>
	</thead>
	<tbody>
	@foreach($averias as $averia)
		<tr data-id="{{$averia->cliente->id}}">
			<td>{{$averia->descripcion}}</td>
			<td>{{date('d-m-Y', strtotime($averia->f_alta))}}</td>
            <td>{{date('d-m-Y', strtotime($averia->f_realizacion))}}</td>
			<td>{{$averia->observaciones}}</td>	
			@if (isset ($averia->empleado))
			<td  >{{$averia->empleado->nombre}} {{$averia->empleado->apellidos}} </td>
			@else
			<td>Por determinar </td> 
			@endif

            <td class="show_clientes">{{$averia->cliente->nombre}} {{$averia->cliente->apellidos}} {{$averia->cliente->nom_empresa}}</td>
			@if (($averia->estado) == 1)
				<td> <img src="../img/tick.png" width="25px" > </td>
			
			@else
		
				<td> <img src="../img/reloj.png" width="25px" > </td>
			
			@endif

			@if (($averia->facturado) == 1)
				<td> <img src="../img/tick.png" width="25px" > </td>
			
			@else
		
				<td> <img src="../img/reloj.png" width="25px" > </td>
			
			@endif
			
				
			<td > <a href="{{route('partes.create')}}"> Crear parte </a></td>
			<!-- <td><img class='btn_borrar' width="32px" src="../img/papelera.png"></td> -->
			<td><a href='{{"averias/$averia->id/edit"}}'><img class='btn_editar' width="32px" src="../img/lapiz.png"></a></td>
		</tr>
		
	@endforeach
	</tbody>

</table>
<div class="modal fade" id="clientes_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modal_body" class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>



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

		$(".show_clientes").click(function(){
            const ClienteId=$(this).closest("tr").data("id");
			console.log(ClienteId)
            $.ajax({
                url    : "{{url('/clientes/listado')}}/"+ClienteId,
                success: function(datos){
                    $("#modal_body").html("");
					let htmlx=""
					console.log(`${datos.nom_empresa}`)
					aux = `${datos.nom_empresa}`
					
					if (aux == "null"){
						htmlx+=`
						<p> <b> Nombre: </b> ${datos.nombre} ${datos.apellidos}</p>
						<p> <b> DNI: </b> ${datos.dni} </p>
						<p> <b> Email: </b><a href="mailto:${datos.email}">${datos.email}</a>   </p>

						<p> <b> Telefono: </b> <a href="tel:${datos.movil}"> ${datos.movil} </a> <a href="tel:${datos.telefono}"> ${datos.telefono}</a> </p>
						<p> <b> Dirección: </b> ${datos.direccion}  
						`;
						

					}
					else if (aux != "null"){
						htmlx+=`	
					<p> <b> Nombre: </b>  ${datos.nom_empresa} </p>
					<p> <b> CIF: </b>  ${datos.cif}  </p>
						<p> <b> Email: </b><a href="mailto:${datos.email}">${datos.email}</a>   </p>
					<p> <b> Telefono: </b> <a href="tel:${datos.movil}"> ${datos.movil} </a> <a href="tel:${datos.telefono}"> ${datos.telefono}</a> </p>
					<p> <b> Dirección: </b> ${datos.direccion}  </p>
					<p> <b> Persona de Contacto: </b> ${datos.per_contacto}
					`;

					
					}
					
                    $("#modal_body").append(htmlx);
                    $("#clientes_modal").modal();


                }
            })    
        })		 
		
$(".btn_borrar").click(function(){
			const $tr=$(this).closest("tr");
			const id=$tr.data("id");
			
			Swal.fire({
			  title: '¿Estás seguro que quieres borrar esta averia?',
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
                'La avería ha sido eliminada.',
                'success'
                )
				$.ajax({
					method  : "POST",
					url		: "/averias/"+id,
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