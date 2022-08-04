<?php
    if(isset($_POST['Enviar'])){
        $nombre=$_POST['nombre'];
        echo $nombre;
        $descripcion=$_POST['descripcion'];
        $estado=$_POST['estado'];
        $fecha=new DateTime();
        $imagen=$fecha->getTimestamp()."_".$_FILES['archivo']['name'];
        $imagen_temp=$_FILES['archivo']['tmp_name'];
        move_uploaded_file($imagen_temp,"imagenes/".$imagen);
        $objConnection = new connection();
        
        $sql="INSERT INTO `anime` (`idAnime`, `nombrea`, `imagen`, `estado`, `descripcion`) VALUES (NULL, '$nombre', '$imagen', '$estado', '$descripcion');";
        $objConnection->ejecutar($sql);
        header("location:anime.php");

    }
?>