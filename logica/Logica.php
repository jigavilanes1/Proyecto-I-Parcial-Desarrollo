<?php    
    require_once("../model/UsuariosModel.php");
    require_once("../model/PeliculasModel.php");
    require_once("../model/ComprasModel.php");
    require_once("../model/SalasModel.php");
    require_once("../model/GenerosModel.php");

    $data = json_decode(file_get_contents("php://input"));

    switch ($data->operacion) {
        case "Guardar":
            $usuario = new Usuarios();            
            $usuario->setCedula($data->cedula);
            $usuario->setNombre($data->nombre);
            $usuario->setEmail($data->email);
            $usuario->setGenero($data->genero);
            $usuario->setUsuario($data->usuario);
            $usuario->setPassword(hash('sha256',md5($data->password)));
            $usuario->setEstado($data->estado);
            $usuario->setTipo($data->tipo);
            if($usuario->BuscarRepetido()) {
                echo 'Error';
            } else {
                $usuario->insertar();
                echo 'Correcto';
            }            
            break;

        case "BuscarUsuarios":
            $usuario = new Usuarios();
            $resultado = $usuario->BuscarTodos(1);
            foreach($resultado as $fila) {                
                echo "<tr align='center'><td>$fila[0]</td><td>$fila[4]</td><td>$fila[1]</td><td>$fila[5]</td><td>$fila[6]</td>
                <td>$fila[2]</td><td>$fila[8]</td>
                <td><a href='#editModal' class='btn btn-warning' type='button' onclick='Editar($fila[0])'><i class='material-icons'>create</i><span></span></a>
                <button class='btn btn-danger' onclick='alertEliminar($fila[0]);'><i class='material-icons'>delete</i></button></td></tr>";
            }
            break;
        
        case "BuscarUsuarios2":
            $usuario = new Usuarios();
            $resultado = $usuario->BuscarTodos(1);
            foreach($resultado as $fila) {                
                echo "<tr align='center'><td>$fila[0]</td><td>$fila[4]</td><td>$fila[1]</td><td>$fila[5]</td><td>$fila[6]</td>
                <td>$fila[8]</td></tr>";
            }
            break;
        
        case "BuscarClientes":
            $usuario = new Usuarios();
            $resultado = $usuario->BuscarTodos(2);
            foreach($resultado as $fila) {
                echo "<tr align='center'><td>$fila[0]</td><td>$fila[4]</td><td>$fila[1]</td><td>$fila[5]</td><td>$fila[6]</td>
                <td>$fila[2]</td><td>$fila[8]</td>
                <td><a href='#editModal' class='btn btn-warning' type='button' onclick='Editar($fila[0])'><i class='material-icons'>create</i><span></span></a>
                <button class='btn btn-danger' onclick='alertEliminar($fila[0]);'><i class='material-icons'>delete</i></button></td></tr>";
            }
            break;

        case "BuscarClientes2":
            $usuario = new Usuarios();
            $resultado = $usuario->BuscarTodos(2);
            foreach($resultado as $fila) {                
                echo "<tr align='center'><td>$fila[0]</td><td>$fila[4]</td><td>$fila[1]</td><td>$fila[5]</td><td>$fila[6]</td>
                <td>$fila[8]</td></tr>";
            }
            break;

        case "Editar":
            $usuario = new Usuarios();
            $usuario->setId($data->id);
            $resultado = $usuario->BuscarPorId();
            foreach($resultado as $fila) {
                echo '<form id="register" class="formulario__register" onsubmit="return false;" autocomplete="off">
                <div class="modal-header">
            <h4 class="modal-title">Editar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div id="resultado1"></div>                                    
                    <label for="ced1"><b>Cédula:</b></label>
                    <input type="text" id="ced2" name="cedula" placeholder="Ingrese la cedula" value="'.$fila[4].'" class="form-control" maxlength="10" onChange="validarCedula(); validarRepetidos();" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <div id="resultado2"></div>
                    <label for="nom1"><b>Nombre y Apellido:</b></label>
                    <input type="text" id="nom2" name="nombre" placeholder="Escriba aqui" value="'.$fila[1].'" class="form-control" onChange="validarNombre();" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <div id="resultado3"></div>
                    <label for="mail1"><b>Email:</b></label>
                    <input type="text" id="mail2" name="email" placeholder="Escriba aqui" value="'.$fila[5].'" class="form-control" onChange="validarEmail(); validarRepetidos()" onKeyUp="letrasMenores();" autocomplete="off" required>
                </div>
                <div class="form-group">							
                    <label for="genero"><b>Género:</b></label>							
                    <select name="select" id="genero2" class="form-control">';
                    if($fila[6] == "Masculino") {
                        echo '<option value="'.$fila[6].'" selected>'.$fila[6].'</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Otros">Otros</option>';
                    } elseif ($fila[6] == "Femenino") {
                        echo '<option value="'.$fila[6].'" selected>'.$fila[6].'</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Otros">Otros</option>';
                    } else {
                        echo '<option value="'.$fila[6].'" selected>'.$fila[6].'</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>';
                    }
        echo    '</select>
                </div>						
                <div class="form-group">
                    <div id="resultado4"></div>
                    <label for="usu1"><b>Usuario</b></label>
                    <input type="text" id="usu2" name="usuario" placeholder="Escriba aqui" value="'.$fila[2].'" class="form-control" onChange="validarUsuario();" autocomplete="off" required>
                </div>                        
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">                                
                    <input class="btn btn-success" type="submit" value="Actualizar" onclick="ActUsuario('.$fila[0].');">
                </div>
            </form>';
            }
            break;
        
        case "ActUsuario":
            $usuario = new Usuarios();
            $usuario->setId($data->id);
            $usuario->setCedula($data->cedula);
            $usuario->setNombre($data->nombre);
            $usuario->setEmail($data->email);
            $usuario->setGenero($data->genero);
            $usuario->setUsuario($data->usuario);
            $usuario->actualizar();
            echo 'Correcto';
            break;

        case "Eliminar":
            $usuario = new Usuarios();
            $usuario->setId($data->id);
            $usuario->eliminar();
            echo 'Correcto';
            break;

        case "Login":
            session_start();
            $usuario = new Usuarios();
            $usuario->setPassword(hash('sha256',md5($data->pwd)));
            $usuario->setUsuario($data->usr);
            $_SESSION["usuario"] = $usuario->getUsuario();
            $_SESSION["pasword"] = $usuario->getPassword();
            if($usuario->Login(1)) {
                echo 'Usuario';                
            } elseif($usuario->Login(2)) {
                echo 'Cliente';
            } else {
                echo 'Incorrecto';
            }
            break;

        case "GuardarPelicula":
            $pelicula = new Peliculas();            
            $pelicula->setNombre($data->nombre);
            $pelicula->setGenero($data->genero);
            $pelicula->setDuracion($data->duracion);            
            $pelicula->setSinopsis($data->sinopsis);
            $pelicula->setTrailer($data->trailer);
            $pelicula->setEstado($data->estado);
            if($pelicula->BuscarRepetido()) {
                echo 'Error';
            } else {
                $pelicula->insertar();
                echo 'Correcto';
            }            
            break;

        case "BuscarPeliculas":
            $pelicula = new Peliculas();
            $resultado = $pelicula->BuscarTodos();
            foreach($resultado as $fila) {                
                echo "<tr align='center'><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td>
                <td>$fila[5]</td><td><img src='../img/$fila[6]' width='100px'></td>
                <td><a href='#editModal' class='btn btn-warning' type='button' onclick='EditarPelicula($fila[0])'><i class='material-icons'>create</i><span></span></a>
                <button class='btn btn-danger' onclick='alertEliminarPelicula($fila[0]);'><i class='material-icons'>delete</i></button></td></tr>";
            }
            break;
        
        case "EditarPelicula":
            $pelicula = new Peliculas();
            $pelicula->setId($data->id);
            $resultado = $pelicula->BuscarPorId();
            foreach($resultado as $fila) {
                echo '<form id="register" class="formulario__register" action="../logica/Procesar2.php" method="POST" autocomplete="off" enctype="multipart/form-data">
					<div class="modal-header">
						<h4 class="modal-title">Editar Película</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">							
							<input type="hidden" id="id" name="id2" value="'.$fila[0].'">
							<label for="nombre2"><b>Nombre:</b></label>
							<input type="text" id="nombre2" name="nombre2" value="'.$fila[1].'" placeholder="Nombre de la película" class="form-control" autocomplete="off">
						</div>
						<div class="form-group" id="selectGenero2">												
						</div>
						<div class="form-group">							
							<label for="duracion2"><b>Duración:</b></label>
							<input type="number" id="duracion2" name="duracion2" value="'.$fila[3].'" placeholder="Duración de la película en minutos" class="form-control" min="0" autocomplete="off">
						</div>
						<div class="form-group">							
							<label for="sinopsis2"><b>Sinopsis:</b></label>
							<textarea id="sinopsis2" name="sinopsis2" rows="10" cols="50" placeholder="Escriba aqui" class="form-control" autocomplete="off">'.$fila[4].'</textarea>							
						</div>
                        <div class="form-group">							
							<label for="trailer2"><b>Trailer:</b></label>
							<input type="text" id="trailer2" name="trailer2" value="'.$fila[5].'" placeholder="Trailer de la película" class="form-control" autocomplete="off">
						</div>
						<div class="form-group">							
							<label for="foto2"><b>Foto</b></label>
							<input type="file" id="foto2" name="foto2" class="form-control" autocomplete="off" accept="image/png" required>
						</div>						
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input class="btn btn-success" type="submit" value="Actualizar">
					</div>
				</form>';
            }
            break;
    
        case "EliminarPelicula":
            $pelicula = new Peliculas();
            $pelicula->setId($data->id);
            $pelicula->eliminar();
            echo 'Correcto';
            break;

        case "Cartelera":
            $pelicula = new Peliculas();
            $resultado = $pelicula->BuscarTodos();
            foreach($resultado as $fila) {
                echo "<div class='col-lg-3 col-md-6 wow fadeInUp' data-wow-delay='0.1s'>
                <div class='team-item'>
                    <div class='team-img position-relative overflow-hidden'>
                        <img class='img-fluid' src='../img/$fila[6]' alt=''>
                        <div class='team-social'>
                            <a class='btn btn-square' href='../paginas/inforPelicula.php?id=$fila[0]'>$fila[1]</a>
                        </div>
                    </div>
                    <div class='bg-secondary text-center p-4'>
                        <a href='../paginas/inforPelicula.php?id=$fila[0]'>
                            <h5 class='text-uppercase'>Comprar</h5>
                        </a>
                    </div>
                </div>
            </div>";                
            }
            break;
        
        case "BuscarInfor":
            session_start();
            $pelicula = new Peliculas();
            $usuario = new Usuarios();
            $usuario->setUsuario($_SESSION['usuario']);
            $pelicula->setId($data->id);
            $resultado = $pelicula->BuscarPorId();
            $resultado2 = $usuario->BuscarPorUsuario();
            foreach($resultado as $fila) {
                foreach($resultado2 as $fila2) {
                    echo "<div class='col-lg-6 wow fadeIn' data-wow-delay='0.1s'>
                    <div class='d-flex flex-column'>
                        <img class='img-fluid w-75 align-self-end' src='../img/$fila[6]' alt=''>
                        <div class='w-50 bg-secondary p-5' style='margin-top: -25%;''>
                            <h1 class='text-uppercase text-primary mb-3'>$fila[1]</h1>                        
                        </div>
                    </div>
                </div>
                <div class='col-lg-6 wow fadeIn' data-wow-delay='0.5s'>
                    <a class='btn btn-link' href='$fila[5]' target='_blank'>
                        <p class='d-inline-block bg-secondary text-primary py-1 px-4'>Ver Trailer</p>
                    </a>
                    <h1 class='text-uppercase mb-4'>Sinopsis</h1>
                    <p>$fila[4]</p>
                    <div class='row g-4'>
                        <div class='col-md-6'>
                            <h3 class='text-uppercase mb-3'>2D ESP</h3>
                            <p class='mb-0'>En los horarios de 18:00 y 21:00</p>
                            <h3 class='text-uppercase mb-3'></h3>
                            <h3 class='text-uppercase mb-3'></h3>
                        </div>
                        <div class='col-md-6'>
                            <h3 class='text-uppercase mb-3'>2D SUB</h3>
                            <p class='mb-0'>En los horarios de 19:00, 20:00 y 21:30</p>
                        </div>
                        <div class='col-md-6'>
                            <h3 class='text-uppercase mb-3'>3D ESP</h3>
                            <p class='mb-0'>En los horarios de 19:00, 20:00 y 21:30</p>
                        </div>
                    </div>
                    <br>
                    <a class='btn btn-link' href='../html/compra.php?id=$fila[0]&usuario=$fila2[0]' target='_blank'>
                        <p class='d-inline-block bg-secondary text-primary py-1 px-4'>Comprar</p>
                    </a>
                </div>";             
                }   
            }
            break;
        
        case "CargarDatos":
            $usuario = new Usuarios();                        
            $usuario->setId($data->idUser);
            $usuario->setCompPeli($data->idPeli);            
            echo $usuario->Seleccionar();
            break;

        case "GuardarCompra":
            $compra = new Compras();
            $compra->setSala($data->sala);
            $compra->setHorario($data->horario);
            $compra->setCantidad($data->cantidad);
            $compra->setTotal($data->total);
            $compra->setUsuId($data->idUser);
            $compra->setPelId($data->idPeli);    
            $compra->insertar();
            echo 'Correcto';
            break;
        
        case "BuscarCompras":
            $compra = new Compras();
            $resultado = $compra->BuscarTodos();
            foreach($resultado as $fila) {                
                echo "<tr align='center'><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td>
                    <td>$fila[5]</td><td>$fila[6]</td><td>$fila[7]</td></tr>";
            }
            break;
        
        case "ComprasUsuario":            
            session_start();
            $compra = new Compras();            
            $usuario = new Usuarios();
            $usuario->setUsuario($_SESSION['usuario']);            
            $resultado = $usuario->BuscarPorUsuario();
            foreach($resultado as $fila) {
                $compra->setUsuId($fila[0]);
            }

            $resultado2 = $compra->BuscarCompraUsuario();
            foreach($resultado2 as $fila) {
                echo "<tr align='center'><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td>
                    <td>$fila[5]</td><td>$fila[6]</td><td>$fila[7]</td></tr>";
            }
            break;

        case "BuscarSalas":
            $sala = new Salas();
            $resultado = $sala->BuscarTodos();
            echo "<div class='form-outline mb-3'>
            <label class='form-label' for='sala'>Sala:</label>
            <br>
            <select id='sala' class='form-select' onchange='CalcularTotal();'>
            <option value='' selected disabled>Seleccione la sala</option>";
            
            foreach($resultado as $fila) {                
                echo "<option value='$fila[0]'>$fila[1]</option>";
            }
            echo "</select></div>";
            break;
        
        case "BuscarPorId":
            $sala = new Salas();
            $sala->setId($data->sala);
            echo $sala->BuscarPorId();
            break;

        case "BuscarGeneros":
            $genero = new Generos();
            $resultado = $genero->BuscarTodos();
            echo "<label for='genero'><b>Género:</b></label>
            <select name='genero' id='genero' class='form-control' required>";
            foreach($resultado as $fila) {                
                echo "<option value='$fila[0]'>$fila[1]</option>";
            }
            echo "</select>";
            break;

        case "BuscarGeneros2":
            $genero = new Generos();
            $resultado = $genero->BuscarTodos();
            echo "<label for='genero2'><b>Género:</b></label>
                <select name='genero2' id='genero2' class='form-control' required>";
                foreach($resultado as $fila) {                
                    echo "<option value='$fila[0]'>$fila[1]</option>";
                }
                echo "</select>";
            break;
    }
