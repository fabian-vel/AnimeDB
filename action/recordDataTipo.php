<?php
if(isset($_POST['EnviarT'])){
    $nombret=$_POST['nombret'];
    $descripciont=$_POST['descripciont'];

    $objConnection = new connection();
    $sql = "INSERT INTO `tipo` (`idt`,`nombret`,`descripciont`) VALUES (NULL,'$nombret','$descripciont');";
    $objConnection->ejecutar($sql);

    header("location:tipo.php");
}

?>