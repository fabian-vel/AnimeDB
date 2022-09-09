<?php

if (isset($_POST['Enviar'])) {
    $objConnection = new connection();
    AddAnime($objConnection);
    AddGenero_Anime($objConnection);
    AddTipo_Anime($objConnection);
    
}

function AddAnime($objConnection)
{
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];
    $img = uploadImg();

    $sql = "INSERT INTO `anime` (`idAnime`, `nombrea`, `imagen`, `estado`, `descripcion`) VALUES ('$nombre', '$nombre', '$img', '$estado', '$descripcion');";
    $objConnection->ejecutar($sql);
    AddTemporada($objConnection);
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

function AddTemporada($objConnection)
{
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

function AddGenero_Anime($objConnection)
{
    $genero = $_POST['genero'];
    $idanime = $_POST['nombre'];
    foreach ($genero as $select) {
        $idgenero = $select;
        $sql = "INSERT INTO `genero_anime` (`genero_idg`, `Anime_idAnime`) VALUES ('$idgenero', '$idanime');";
        $objConnection->ejecutar($sql);
    }
}

function AddTipo_Anime($objConnection){
    $idtipo = $_POST['tipoA'];
    $idanime = $_POST['nombre'];

    $sql = "INSERT INTO `tipo_anime` (`Tipo_idt`, `Anime_idAnime`) VALUES ('$idtipo', '$idanime');";
    $objConnection->ejecutar($sql);
}