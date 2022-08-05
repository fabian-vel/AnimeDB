<?php
    if(isset($_POST['Enviar'])){
        $nombre=$_POST['nombre'];
        echo $nombre;
        $descripcion=$_POST['descripcion'];
        $estado=$_POST['estado'];
        $img=uploadImg();
        $objConnection = new connection();
        
        $sql="INSERT INTO `anime` (`idAnime`, `nombrea`, `imagen`, `estado`, `descripcion`) VALUES (NULL, '$nombre', '$img', '$estado', '$descripcion');";
        $objConnection->ejecutar($sql);
        header("location:anime.php");

    }

    function uploadImg(){
        $direccion='imagenes/';
        $fecha=new DateTime();
        $nombreImg=$_FILES['img']['name'];

        $imagen=$fecha->getTimestamp()."_".$nombreImg;
        move_uploaded_file($_FILES['img']['tmp_name'],$direccion.$imagen);
        return $imagen;
    }
?>