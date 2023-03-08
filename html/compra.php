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
  <title>Compra</title>
</head>

<body onload="CargarDatos(); BuscarSalas();">  
  <div class="overlay">
    <section class="vh-100">
      <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">          
            <form onsubmit="return false;">
              <div class="con">
                <div class="form-outline mb-4">
                  <header class="head-form">
                    <h2>Compra</h2>        
                    <p>Ingrese los datos de su compra</p>                    
                  </header>                  
                  <label class="form-label" for="nombre">Nombre:</label>
                  <br>                  
                  <input type="text" id="nombre" class="form-input" placeholder="Ingrese su nombre" disabled>
                </div>
                <div class="form-outline mb-3">
                  <label class="form-label" for="email">Email:</label>
                  <br>                  
                  <input type="email" id="email" class="form-input" placeholder="Ingrese su correo" disabled>
                </div>
                <div class="form-outline mb-3">
                  <label class="form-label" for="pelicula">Pelicula:</label>
                  <br>                  
                  <input type="text" id="pelicula" class="form-input" disabled>
                </div>
                <div id="selectSala">                                      
                </div>                
                <div class="form-outline mb-3">
                  <label class="form-label" for="horario">Horario:</label>
                  <br>                  
                  <select id="horario" class="form-select">
                    <option value="" selected disabled>Seleccione el horario</option>
                    <option value="18:00">18:00</option>
                    <option value="19:00">19:00</option>
                    <option value="20:00">20:00</option>
                    <option value="21:00">21:00</option>
                    <option value="21:30">21:30</option>
                  </select>
                </div>
                <div class="form-outline mb-3">
                  <label class="form-label" for="cantidad" style="color:white;">Cantidad:</label>
                  <br>                  
                  <input type="number" id="cantidad" onchange="CalcularTotal();" class="form-input" placeholder="Ingrese su numero de entradas" value="0">
                </div>
                <div class="form-outline mb-3">
                  <label class="form-label" for="total" style="color:white;">Total a pagar:</label>
                  <br>                  
                  <input type="number" style="color:white;" id="total" class="form-input" value="0" disabled>
                </div>
                <div class="text-center text-lg-start mt-4 pt-2 ">
                  <button type="submit" class="log-in" onclick="GuardarCompra();">Comprar</button>
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