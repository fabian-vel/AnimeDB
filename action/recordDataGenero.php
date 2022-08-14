<?php
if(isset($_POST['EnviarG'])){
    $nombreg=$_POST['nombreg'];
    $descripciong=$_POST['descripciong'];

    $objConnection = new connection();
    $sql = "INSERT INTO `genero` (`idg`,`nombreg`,`descripciong`) VALUES (NULL,'$nombreg','$descripciong');";
    $objConnection->ejecutar($sql);

    header("location:genero.php");
}

?>