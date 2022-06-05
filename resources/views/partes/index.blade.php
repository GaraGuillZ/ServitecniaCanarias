@extends('layouts.app2')

@section("contenido")
<div style="display:flex;"  >
<div>
<a href="{{route('partes.create')}}" class="btn btn-success">+ Insertar</a>
<a href="{{route('partes.pdf')}}" class="btn btn-warning">Generar PDF</a>
</div>
</div>
<br>
<br>
<h1>Partes</h1>

<table id="tabla" class="ui olive table hover" style="text-align: center;">
	<thead>
		<tr>
        <th style="font-size:14px">Numero de parte</th>
		<th style="font-size:14px">Descripción</th>
		<th style="font-size:14px">Fecha</th>
        <th style="font-size:14px">Trabajos realizados</th>
        <th style="font-size:14px">Observaciones</th>
        <th style="font-size:14px">Mano de obra</th>
        <th style="font-size:14px" >Firma del cliente</th>
        <th style="font-size:14px" >Firma del profesional</th>
		<th style="font-size:14px" class="not-export-col" >Imagen</th>
		<th style="font-size:14px" class="not-export-col" >Albarán</th>
        <th class="not-export-col"></th>
	</tr>
	</thead>
	<tbody>
	@foreach($partes as $parte)
		<tr data-id="{{$parte->id}}">
			<td>{{$parte->n_parte}}</td>
            <td>{{$parte->descripcion}}</td>
            <td>{{date('d-m-Y', strtotime($parte->f_inicio))}}</td>
            <td>{{$parte->trabajos_realizados}}</td>
			<td>{{$parte->observaciones}}</td>	
			<td>{{$parte->mano_de_obra}}</td>
			<td>{{$parte->cliente->nombre}} {{$parte->cliente->apellidos}} {{$parte->cliente->nom_empresa}}</td>

			<td  >{{$parte->empleado->nombre}} {{$parte->empleado->apellidos}} </td>
			@if (($parte->imagen) != null)

				<td> <a href="{{$parte->imagen}}"> Ver imagen </a> </td>
			@else
			<td> No hay imagen </td>
			@endif

			@if (($parte->albaran) != null)

				<td> <a href="{{$parte->albaran}}"> Ver albarán </a> </td>
			@else
			<td> No hay albarán  </td>
			@endif
            <td><img class='btn_borrar' width="32px" src="https://images.vexels.com/media/users/3/223479/isolated/lists/8ecc75c9d0cf6d942cce96e196d4953f-icono-de-papelera-plana.png"></td>
		</tr>
		
	@endforeach
	</tbody>

</table>


<script>
	$(document).ready(function(){
		// $("#tabla").DataTable({
		// 	language: { url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json" },
        //     rowReorder: true,
        //     columnDefs: [
        //     { orderable: true, className: 'reorder', targets: 0 },
        //     { orderable: false, targets: '_all' }
        //     ]
		// });
		
		$('#tabla').DataTable({
			language: { url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json" },
                dom: "Blfrtip",
                buttons: [
                    {
                        text: 'csv',
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                    {
                        text: 'excel',
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                    {
                        text: 'pdf',
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                    {
                        text: 'print',
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
					
					

                ],
                columnDefs: [{
                    orderable: false,
                    targets: -1
                }] 
            });
			$("ul li ul li").click(function() {
    		var i = $(this).index() + 1
    		var table = $('#tabla').DataTable();
    		if (i == 1) {
        		table.button('.buttons-csv').trigger();
    		} else if (i == 2) {
       			 table.button('.buttons-excel').trigger();
   			} else if (i == 3) {
        		table.button('.buttons-pdf').trigger();
    		} else if (i == 4) {
        		table.button('.buttons-print').trigger();
    } 
});

	$(".btn_borrar").click(function(){
			const $tr=$(this).closest("tr");
			const id=$tr.data("id");
			
			Swal.fire({
			  title: '¿Estás seguro que quieres borrar este parte?',
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
                'Se ha eliminado el parte.',
                'success'
                )
				$.ajax({
					method  : "POST",
					url		: "/partes/"+id,
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
<style> 
.dt-buttons {
    display: none;
}
.pull-left ul {
    list-style: none;
    margin: 0;
    padding-left: 0;
}
.pull-left a {
    text-decoration: none;
    color: #ffffff;
}
.pull-left li {
    color: #ffffff;
    background-color: #2f2f2f;
    border-color: #2f2f2f;
    display: block;
    float: left;
    position: relative;
    text-decoration: none;
    transition-duration: 0.5s;
    padding: 12px 30px;
    font-size: .75rem;
    font-weight: 400;
    line-height: 1.428571;
}
.pull-left li:hover {
    cursor: pointer;
}
.pull-left ul li ul {
    visibility: hidden;
    opacity: 0;
    min-width: 9.2rem;
    position: absolute;
    transition: all 0.5s ease;
    margin-top: 8px;
    left: 0;
    display: none;
}
.pull-left ul li:hover>ul,
.pull-left ul li ul:hover {
    visibility: visible;
    opacity: 1;
    display: block;
}
.pull-left ul li ul li {
    clear: both;
    width: 100%;
    color: #ffffff;
}
.ul-dropdown {
    margin: 0.3125rem 1px !important;
    outline: 0;
}
.firstli {
    border-radius: 0.2rem;
}
.firstli .material-icons {
    position: relative;
    display: inline-block;
    top: 0;
    margin-top: -1.1em;
    margin-bottom: -1em;
    font-size: 0.8rem;
    vertical-align: middle;
    margin-right: 5px;
}
</style>


@endsection