function GuardarUsuario() {    
    let cedula = document.querySelector("#ced1");
    let nombre = document.querySelector("#nom1");
    let email = document.querySelector("#mail1");
    let usuario = document.querySelector("#usu1");
    let password = document.querySelector("#pass1");
    let password2 = document.querySelector("#pass2");    
    let genero = document.querySelector("#genero");    

    if(cedula.value == "" || nombre.value == "" || email.value == "" || usuario.value == "" || password.value == "" || password2.value == "") {
        cedula.required = true;
        nombre.required = true;
        email.required = true;        
        usuario.required = true;
        password.required = true;
        password2.required = true;
    } else {    
        let xhr = new XMLHttpRequest();

        xhr.open("POST","../logica/Logica.php",true);

        xhr.onreadystatechange = function() {
            if(xhr.readyState === 4 && xhr.status === 200) {
                let mensaje = this.responseText;
                if(mensaje == "Error") {
                    alertas("Error","No se pudo guardar. Usuario ya existe");
                } else {
                    alertas("Exito","Se realizó la acción correctamente", function() {
                        setInterval("location.reload()",700);
                    });                
                }
            }
        }
        
        let data = JSON.stringify({"cedula":cedula.value,"nombre":nombre.value,"email":email.value,"genero":genero.value,"usuario":usuario.value,"password":password2.value,"estado":"Activo","tipo":1,"operacion":"Guardar"});

        xhr.send(data);        
    }
}

function GuardarCliente() {    
    let cedula = document.querySelector("#cedula");
    let nombre = document.querySelector("#nombre");
    let email = document.querySelector("#correo");
    let usuario = document.querySelector("#usuario");
    let password = document.querySelector("#contrasena");      
    let genero = document.querySelector("#genero");    

    if(cedula.value == "" || nombre.value == "" || email.value == "" || usuario.value == "" || password.value == "" || genero.value == "") {
        cedula.required = true;
        nombre.required = true;
        email.required = true;
        usuario.required = true;
        password.required = true;
        genero.required = true;
    } else {    
        let xhr = new XMLHttpRequest();

        xhr.open("POST","../logica/Logica.php",true);

        xhr.onreadystatechange = function() {
            if(xhr.readyState === 4 && xhr.status === 200) {
                let mensaje = this.responseText;
                if(mensaje == "Error") {
                    alertas("Error","No se pudo guardar. Usuario ya existe");
                } else {
                    alertas("Exito","Se realizó la acción correctamente", function() {
                        setInterval("location.reload()",700);
                    });                
                }
            }
        }
        
        let data = JSON.stringify({"cedula":cedula.value,"nombre":nombre.value,"email":email.value,"genero":genero.value,"usuario":usuario.value,"password":password.value,"estado":"Activo","tipo":2,"operacion":"Guardar"});

        xhr.send(data);        
    }
}

function BuscarUsuarios() {
    let datos = document.querySelector("#datos");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            datos.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({"operacion":"BuscarUsuarios"});

    xhr.send(data);
}

function BuscarUsuarios2() {
    let admin = document.querySelector("#administradores");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            admin.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({"operacion":"BuscarUsuarios2"});

    xhr.send(data);
}

function BuscarClientes() {
    let clientes = document.querySelector("#clientes");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            clientes.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({"operacion":"BuscarClientes"});

    xhr.send(data);
}

function BuscarClientes2() {
    let clientes = document.querySelector("#clientes");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            clientes.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({"operacion":"BuscarClientes2"});

    xhr.send(data);
}

function Editar(id) {
    $("#editModal").modal("show");
    let modal = document.querySelector("#res2");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) { 
            modal.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({"id":id,"operacion":"Editar"});

    xhr.send(data);    
}

function ActUsuario(id) {    
    let cedula = document.querySelector("#ced2").value;
    let nombre = document.querySelector("#nom2").value;
    let email = document.querySelector("#mail2").value;
    let usuario = document.querySelector("#usu2").value;    
    let genero = document.querySelector("#genero2").value;    

    let xhr = new XMLHttpRequest();

    xhr.open("POST","../logica/Logica.php",true);

    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            let mensaje = this.responseText;
            if(mensaje == "Error") {
                alertas("Error","No se pudo guardar. Usuario ya existe");
            } else {
                alertas("Exito","Se realizó la acción correctamente", function() {
                    setInterval("location.reload()",700);
                });                
            }
        }
    }
    
    let data = JSON.stringify({"id":id,"cedula":cedula,"nombre":nombre,"email":email,"genero":genero,"usuario":usuario,"operacion":"ActUsuario"});

    xhr.send(data);    
}

function Eliminar(id) {    
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            let mensaje = this.responseText;
            if(mensaje == "Correcto") {
                alertas("Exito","Se realizó la acción correctamente", function() {
                    setInterval("location.reload()",700);
                });                
            } else {
                alertas("Error","No se pudo eliminar");
            }
        }
    }
    let data = JSON.stringify({"id":id,"operacion":"Eliminar"});

    xhr.send(data);    
}

function Login() {
    let usr = document.querySelector("#usuario");
    let pwd = document.querySelector("#password");

    if(usr.value == "" || pwd.value == "") {
        usr.required = true;
        pwd.required = true;        
    } else {
        let xhr = new XMLHttpRequest();

        xhr.open("POST","logica/Logica.php",true);

        xhr.onreadystatechange = function() {
            if(xhr.readyState === 4 && xhr.status === 200) {
                let mensaje = this.responseText;
                if(mensaje == "Usuario") {
                    window.location.href = "html/administracion.php";
                } else if(mensaje == "Cliente") {
                    window.location.href = "html/principal.php";
                } else {
                    window.location.href = "html/pagerror.html";
                }
            }
        }
        
        let data = JSON.stringify({"usr":usr.value,"pwd":pwd.value,"operacion":"Login"});

        xhr.send(data);
    }    
}

function alertas(titulo, mensaje, funcion) {
    alertify.alert(titulo,mensaje, funcion);
}

function alertEliminar(id) {
    alertify.confirm('Eliminar datos', 'Desea eliminar estos datos?',
    function() {Eliminar(id)},
    function() {alertify.error('Cancelado')});
}

function BuscarPeliculas() {
    let datos = document.querySelector("#datos");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            datos.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({"operacion":"BuscarPeliculas"});

    xhr.send(data);
}

function EditarPelicula(id) {
    $("#editModal").modal("show");
    let modal = document.querySelector("#res2");    
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) { 
            modal.innerHTML = this.responseText;
            BuscarGeneros2();
        }
    }
    let data = JSON.stringify({"id":id,"operacion":"EditarPelicula"});

    xhr.send(data);    
}

function EliminarPelicula(id) {    
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            let mensaje = this.responseText;
            if(mensaje == "Correcto") {
                alertas("Exito","Se realizó la acción correctamente", function() {
                    setInterval("location.reload()",700);
                });                
            } else {
                alertas("Error","No se pudo eliminar");
            }
        }
    }
    let data = JSON.stringify({"id":id,"operacion":"EliminarPelicula"});

    xhr.send(data);    
}

function alertEliminarPelicula(id) {
    alertify.confirm('Eliminar datos', 'Desea eliminar estos datos?',
    function() {EliminarPelicula(id)},
    function() {alertify.error('Cancelado')});
}

function Cartelera() {
    let cartelera = document.querySelector("#cartelera");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            cartelera.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({"operacion":"Cartelera"});

    xhr.send(data);
}

function BuscarInfor() {
    let infor = document.querySelector("#infor");
    let urlSearchParams = new URLSearchParams(window.location.search);
    let id = urlSearchParams.get("id");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            infor.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({"id":id,"operacion":"BuscarInfor"});

    xhr.send(data);
}

function CargarDatos() {
    let urlSearchParams = new URLSearchParams(window.location.search);
    let idPeli = urlSearchParams.get("id");
    let idUser = urlSearchParams.get("usuario");
    let nombre = document.querySelector("#nombre");
    let email = document.querySelector("#email");
    let pelicula = document.querySelector("#pelicula");
    
    let xhr = new XMLHttpRequest();

    xhr.open("POST","../logica/Logica.php",true);

    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            let data = JSON.parse(this.responseText);
            nombre.value = data[0].usu_nombre;
            email.value = data[0].usu_email;
            pelicula.value = data[0].pel_nombre;            
        }
    }

    let data = JSON.stringify({"idPeli":idPeli,"idUser":idUser,"operacion":"CargarDatos"});

    xhr.send(data);
}

function GuardarCompra() {
    let urlSearchParams = new URLSearchParams(window.location.search);
    let idPeli = urlSearchParams.get("id");
    let idUser = urlSearchParams.get("usuario");    
    let sala = document.querySelector("#sala");
    let horario = document.querySelector("#horario");
    let cantidad = document.querySelector("#cantidad");
    let total = document.querySelector("#total");

    if(sala.value == "" || horario.value == "" || cantidad.value < 1) {
        sala.required = true;
        horario.required = true;
        cantidad.min = 1;
    } else {    
        let xhr = new XMLHttpRequest();

        xhr.open("POST","../logica/Logica.php",true);

        xhr.onreadystatechange = function() {
            if(xhr.readyState === 4 && xhr.status === 200) {
                let mensaje = this.responseText;
                if(mensaje == "Error") {
                    alertas("Error","No se pudo realizar compra.");
                } else {
                    alertas("Exito","Se realizó la acción correctamente", function() {
                        window.close();
                    });                
                }
            }
        }
        
        let data = JSON.stringify({"idPeli":idPeli,"idUser":idUser,"sala":sala.value,"horario":horario.value,"cantidad":cantidad.value,"total":total.value,"operacion":"GuardarCompra"});

        xhr.send(data);        
    }
}

function CalcularTotal() {
    let sala = document.getElementById("sala").value;
    let cantidad = document.getElementById("cantidad");
    let total = document.getElementById("total");
    let precio = 0;

    let xhr = new XMLHttpRequest();
    xhr.open("POST","../logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            let data = JSON.parse(this.responseText);
            precio = cantidad.value * data[0].sala_precio;
            total.value = precio.toFixed(2);   
        }
    }
    let data = JSON.stringify({"sala":sala,"operacion":"BuscarPorId"});

    xhr.send(data);    
}

function BuscarCompras() {
    let compras = document.querySelector("#comprasT");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            compras.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({"operacion":"BuscarCompras"});

    xhr.send(data);
}

function ComprasUsuario() {
    let compras = document.querySelector("#compras");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            compras.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({"operacion":"ComprasUsuario"});

    xhr.send(data);
}

function BuscarSalas() {
    let salas = document.querySelector("#selectSala");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            salas.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({"operacion":"BuscarSalas"});

    xhr.send(data);
}

function BuscarGeneros() {
    let genero = document.querySelector("#selectGenero");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            genero.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({"operacion":"BuscarGeneros"});

    xhr.send(data);
}

function BuscarGeneros2() {
    let genero = document.querySelector("#selectGenero2");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            genero.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({"operacion":"BuscarGeneros2"});

    xhr.send(data);
}