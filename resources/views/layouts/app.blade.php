<link  rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- <style>
	body {
        border: 4px solid black;
        margin: 40px;
        padding: 40px;
        border-radius: 20px
}
</style> -->

<nav class="navbar navbar-light  justify-content-between;" style="background-color: orange; height: 100px">
  
  <img src="../img/servitecniacanarias.png" width="150px" >
  <button style="background-color: orange; border: none"> <a href="/empleados" style="color: black; font-weight:bold" ><img src= "../img/menuempleados.png" width="150px" height="75px"> </a> </button>
  <button style="background-color: orange; border: none"> <a href="/clientes" style="color: black; font-weight:bold" ><img src= "../img/menuclientes.png" width="150px" height="75px"> </a> </button>
  <button style="background-color: orange; border: none"> <a href="/averias" style="color: black; font-weight:bold" ><img src= "../img/menuaverias.png" width="150px" height="75px"> </a> </button>
  <button style="background-color: orange; border: none"> <a href="/materiales" style="color: black; font-weight:bold" ><img src= "../img/menumateriales.png" width="150px" height="75px"> </a> </button>
  <button style="background-color: orange; border: none"> <a href="/partes" style="color: black; font-weight:bold" ><img src= "../img/menupartes.png" width="150px" height="75px"> </a> </button>
</nav>


<div class="container" style="margin-top:30px">
	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	@yield("contenido")
</div>



