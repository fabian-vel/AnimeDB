<?php 
include('./header.php');
include('./connection/connection.php');
include('./action/recordData.php');
$obj = new connection();
?>
<br>
<div class="container">
    <div class="card">
        <div class="card-header">
            Registro del Anime
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        Nombre del anime: <input class="from-comtrol" type="text" name="nombre" id="">
                        <br>
                        Imagen del anime: <input class="from-comtrol" type="file" name="img" id="">
                        <br>
                        Estado <br>
                        Terminado <input class="from-comtrol" type="radio" name="estado" value="0">
                        En Proceso <input class="from-comtrol" type="radio" name="estado" value="1">
                        <br>
                        Descripcion: 
                        <textarea  class="form-control" type="textarea" name="descripcion"  rows="3" id=""></textarea>
                        <br>
                        <input class="btn btn-success" type="submit" name="Enviar" value="Enviar"> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-body">
                    <form method="post">
                        Temporadas del anime
                        <br>
                        No. Temporada: <input type="number" name="Notemporadaa" id="">
                        <br>
                        <input class="btn btn-success" type="submit" name="Enviar1" value="Enviar T">
                        <br>
                        
                        <?php
                        $num=1;
                        if(isset($_POST['Enviar1'])){
                            $num=$_POST['Notemporadaa'];
                        }
                        ?>
                        <input type="hidden" name="tempor" value="<?php echo $num;?>">
                        <?php
                            for($i=1;$i<=$num;$i++){
                                $cap="capitulos".$i;
                        ?>
                        capitulos de la temporada <?php echo $i; ?>: <input type="number" name="<?php echo $cap;?>">
                        <br>
                        <?php
                        }
                        ?>
                        <br>
                        <input class="btn btn-success" type="submit" name="Enviar2" value="Guardar temporadas">
                        <br>
                        Temporadas vista
                        <br>
                        Temporada: <input type="number" name="temporadav" id="">
                        <br>
                        capitulo: <input type="number" name="capitulosv" id="">
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-body">
                    <form action="anime.php">
                    Genero: 
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Seleccione un genero</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <br>
                        Tipo: 
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Seleccione un tipo</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include('./footer.php') ?>