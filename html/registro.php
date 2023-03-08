<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../css/stylelog.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="../js/operaciones.js"></script>
  <script src="../js/alertify.min.js"></script>
	<link rel="stylesheet" href="../css/alertify.min.css"/>
	<link rel="stylesheet" href="../css/themes/default.min.css"/>
  <title>Registro</title>
</head>

<body>  
  <div class="overlay">
    <section class="vh-100">
      <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">          
            <form onsubmit="return false;">
              <div class="con">
                <div class="form-outline mb-4">
                  <header class="head-form">
                    <h2>Registrarse</h2>        
                    <p>Ingrese sus datos</p>                    
                  </header>
                  <div id="res"></div>
                  <label class="form-label" for="nombre">Nombre y Apellido:</label>
                  <br>
                  <span class="input-item">
                    <i class="fa fa-user-circle"></i>
                  </span>
                  <input type="text" id="nombre" class="form-input" placeholder="Ingrese su nombre" required>
                </div>
                <div class="form-outline mb-3">
                  <label class="form-label" for="correo">Correo:</label>
                  <br>
                  <span class="input-item">
                    <i class="fa fa-user-circle"></i>
                  </span>
                  <input type="email" id="correo" class="form-input" placeholder="Ingrese su correo" required>
                </div>
                <div class="form-outline mb-3">
                  <label class="form-label" for="cedula">Cedula:</label>
                  <br>
                  <span class="input-item">
                    <i class="fa fa-user-circle"></i>
                  </span>
                  <input type="text" id="cedula" class="form-input" placeholder="Ingrese su cedula" required>
                </div>
                <div class="form-outline mb-3">
                  <label class="form-label" for="genero">Genero:</label>
                  <br>
                  <span class="input-item">
                    <i class="fa fa-user-circle"></i>
                  </span>
                  <select id="genero" class="form-select">
                    <option selected>Seleccione...</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otros">Otros</option>
                  </select>
                </div>
                <div class="form-outline mb-3">
                  <label class="form-label" for="usuario">Usuario:</label>
                  <br>
                  <span class="input-item">
                    <i class="fa fa-user-circle"></i>
                  </span>
                  <input type="text" id="usuario" class="form-input" placeholder="Ingrese su usuario" required>
                </div>
                <div class="form-outline mb-3">
                  <label class="form-label" for="contrasena">Contraseña:</label>
                  <br>
                  <span class="input-item">
                    <i class="fa fa-user-circle"></i>
                  </span>
                  <input type="password" id="contrasena" class="form-input" placeholder="Ingrese su contraseña" required>
                </div>
                <div class="text-center text-lg-start mt-4 pt-2 ">
                  <button type="submit" class="log-in" onclick="GuardarCliente();">Guardar</button>
                </div>                
                <div class="other">
                  <button class="btn submits frgt-pass" onclick="window.location.href='../index.php';"><- Regresar</button>                  
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>
  </section>

</body>

</html>