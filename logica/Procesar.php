<?php 
    require_once("../model/PeliculasModel.php");

    $nombre = $_POST['nombre'];
    $genero = $_POST['genero'];
    $duracion = $_POST['duracion'];
    $sinopsis = $_POST['sinopsis'];
    $trailer = $_POST['trailer'];
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    $nombre_foto = '../img/' . $foto;

    $pelicula = new Peliculas();            
    $pelicula->setNombre($nombre);
    $pelicula->setGenero($genero);
    $pelicula->setDuracion($duracion);            
    $pelicula->setSinopsis($sinopsis);
    $pelicula->setTrailer($trailer);
    $pelicula->setFoto($foto);
    $pelicula->setEstado("Activo");
    if($pelicula->BuscarRepetido()) {
        header('Location: ../html/peliculas.php?mensaje=fallo');
    } else {
        $pelicula->insertar();
        move_uploaded_file($tmp,$nombre_foto);
        header('Location: ../html/peliculas.php?mensaje=ok');
    }
?>