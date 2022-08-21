<?php

if(isset($_POST['Enviar2'])){
    AddAnime();
    AddTemporada();
    header("location:anime.php");
}

function AddAnime()
{
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];
    $img = uploadImg();
    $objConnection = new connection();

    $sql = "INSERT INTO `anime` (`idAnime`, `nombrea`, `imagen`, `estado`, `descripcion`) VALUES ('$nombre', '$nombre', '$img', '$estado', '$descripcion');";
    $objConnection->ejecutar($sql);
}

function uploadImg()
{
    $directorio = 'imagenes/';
    $fecha = new DateTime();
    $nombreImg = $_FILES['img']['name'];
    if (!file_exists($directorio)) {
        mkdir($directorio, 0777, true);
        $imagen = $fecha->getTimestamp() . "_" . $nombreImg;
        move_uploaded_file($_FILES['img']['tmp_name'], $directorio . $imagen);
    } elseif (file_exists($directorio)) {
        $imagen = $fecha->getTimestamp() . "_" . $nombreImg;
        move_uploaded_file($_FILES['img']['tmp_name'], $directorio . $imagen);
    }
    return $imagen;
}

function AddTemporada()
{
    $objConnection = new connection();
    $numTenporada = $_POST['tempor'];
    $nombre = $_POST['nombre'];
    print_r($_POST);
    for ($i = 1; $i <= $numTenporada; $i++) {
        $num = "capitulos" . $i;
        $capitulo = $_POST[$num];
        $sql = "INSERT INTO `temporada` (`idtemporada`, `capitulo`, `numero`, `Anime_idAnime`) VALUES (NULL,'$capitulo','$i','$nombre');";
        $objConnection->ejecutar($sql);
    }
}
