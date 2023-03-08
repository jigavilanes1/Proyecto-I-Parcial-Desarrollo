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
	<title>Clientes</title>
</head>

<body onload="BuscarClientes();">
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
	<div class="contenedor">
		<header>
			<h1>Edición de Clientes</h1>
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
							<h2><b>Clientes</b></h2>
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover" id="tabla">
					<thead>
						<tr align="center">
							<th>ID</th>
							<th>Cédula</th>
							<th>Nombre</th>
							<th>Email</th>
							<th>Género</th>
							<th>Usuario</th>
							<th>Estado</th>
							<th></th>
						</tr>
					</thead>
					<tbody id="clientes"></tbody>
				</table>
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
	<script src="../js/funcionesCRUD.js"></script>
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