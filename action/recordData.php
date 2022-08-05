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
        $direccion='/imagenes';
        $fecha=new DateTime();
        $nombreImg=$_FILES['archivo']['name'];
        $imagen_temp=$_FILES['archivo']['tmp_name'];

        $imagen=$fecha->getTimestamp()."_".$nombreImg;
        if(move_uploaded_file($imagen_temp,$direccion.$imagen."jpg")){
            echo "imagen guardada";
        }else{
            echo "imagen no guardada";
        }
        return $imagen;
    }
?>