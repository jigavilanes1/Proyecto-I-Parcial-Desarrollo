<?php 
    require_once("../model/PeliculasModel.php");

    $id = $_POST['id2'];
    $nombre = $_POST['nombre2'];
    $genero = $_POST['genero2'];
    $duracion = $_POST['duracion2'];
    $sinopsis = $_POST['sinopsis2'];
    $trailer = $_POST['trailer2'];
    $foto = $_FILES['foto2']['name'];
    $tmp = $_FILES['foto2']['tmp_name'];

    $nombre_foto = '../img/' . $foto;

    $pelicula = new Peliculas(); 
    $pelicula->setId($id);           
    $pelicula->setNombre($nombre);
    $pelicula->setGenero($genero);
    $pelicula->setDuracion($duracion);            
    $pelicula->setSinopsis($sinopsis);
    $pelicula->setTrailer($trailer);
    $pelicula->setFoto($foto);
    $pelicula->actualizar();
    move_uploaded_file($tmp,$nombre_foto);
    header('Location: ../html/peliculas.php?mensaje=ok');    
?>