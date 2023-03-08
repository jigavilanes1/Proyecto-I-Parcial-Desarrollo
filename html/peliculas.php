<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="shortcut icon" href="../favicon/favicon.ico">
	<link rel="stylesheet" href="../css/estilosCrud.css" type="text/css">
	<link rel="stylesheet" href="../css/estilosTabla.css" type="text/css">
	<link rel="stylesheet" href="../css/estilosValidaciones.css" type="text/css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="../js/operaciones.js"></script>
	<script src="../js/alertify.min.js"></script>
	<link rel="stylesheet" href="../css/alertify.min.css"/>
	<link rel="stylesheet" href="../css/themes/default.min.css"/>
	<title>Peliculas</title>
</head>

<body onload="BuscarPeliculas(); BuscarGeneros();">
	<nav class="navbar navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand">Usuario:
					<?php session_start();
					if (!isset($_SESSION['usuario']) && !isset($_SESSION['password'])) {
						header('Location: ../index.php');
						exit();
					}
					echo $_SESSION['usuario'];
					?>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</a>
			</div>
			<ul class="nav navbar-nav navbar-right ">
				<li><button class="btn btn-danger" onclick="window.location.href='administracion.php';">Volver</button></li>
			</ul>
		</div>
	</nav>

	<?php 
		if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'ok') {
			echo '<div class="alert alert-success" role="alert">Se realizó la acción correctamente</div>';
		}
		if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'fallo') {
			echo '<div class="alert alert-danger" role="alert">No se pudo guardar. Pelicula ya existe</div>';
		}		
	?>
	
	<div class="contenedor">
		<header>
			<h1>Películas</h1>
			<h2 id="fecha"></h2>
		</header>
		<main>
			<nav>
				<a href="#" class="banner">
					<div class="wrap">
						<div class="search">
							<input id="s" type="text" class="searchTerm" placeholder="Buscar" onKeyUp="doSearch();" onChange="buscarUsuario()">
							<button type="submit" class="searchButton">
								<i class="fa fa-search"></i>
							</button>
						</div>
					</div>
				</a>
			</nav>
		</main>
	</div>
	<div class="container-xl">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
							<h2><b>Películas</b></h2>
						</div>
						<div class="col-sm-6">
							<a href="#addModal" class="btn btn-success" type="button" data-toggle="modal"><i class="material-icons">&#xE147;</i><span>Añadir película</span></a>
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover" id="tabla">
					<thead>
						<tr align="center">
							<th>ID</th>							
							<th>Nombre</th>							
							<th>Género</th>
							<th>Duración (min)</th>							
							<th>Trailer</th>
							<th>Foto</th>							
							<th></th>
						</tr>
					</thead>
					<tbody id="datos"></tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Añadir Modal HTML -->
	<div id="addModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="register" class="formulario__register" action="../logica/Procesar.php" method="POST" autocomplete="off" enctype="multipart/form-data">
					<div class="modal-header">
						<h4 class="modal-title">Añadir Película</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">							
							<input type="hidden" id="id">
							<label for="nombre"><b>Nombre:</b></label>
							<input type="text" id="nombre" name="nombre" placeholder="Nombre de la película" class="form-control" autocomplete="off" required>
						</div>
						<div class="form-group" id="selectGenero">							
						</div>
						<div class="form-group">							
							<label for="duracion"><b>Duración:</b></label>
							<input type="number" id="duracion" name="duracion" placeholder="Duración de la película en minutos" class="form-control" min="0" autocomplete="off" required>
						</div>
						<div class="form-group">							
							<label for="sinopsis"><b>Sinopsis:</b></label>
							<textarea id="sinopsis" name="sinopsis" rows="10" cols="50" placeholder="Escriba aqui" class="form-control" autocomplete="off" required></textarea>							
						</div>
						<div class="form-group">							
							<label for="trailer"><b>Trailer:</b></label>
							<input type="text" id="trailer" name="trailer" placeholder="Trailer de la película" class="form-control" autocomplete="off" required>
						</div>
						<div class="form-group">							
							<label><b>Foto</b></label>
							<input type="file" name="foto" class="form-control" accept="image/png" required/>
						</div>						
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input class="btn btn-success" type="submit" value="Registrar">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Editar Modal HTML -->
	<div id="editModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div id="res2"></div>
			</div>
		</div>
	</div>

	<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
	<script src="../js/pushbar.js"></script>	
	<script src="../js/validaciones.js"></script>
	<script src="../js/validaciones2.js"></script>
	<script type="text/javascript">
		//Inicializar el script
		var pushbar = new Pushbar({
			blur: true,
			overlay: true
		});
	</script>
</body>

</html>