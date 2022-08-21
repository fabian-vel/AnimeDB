<?php 
include('./header.php');
include('./connection/connection.php');
include('./action/recordDataAnime.php');
$obj = new connection();
$generos=$obj->consultar("SELECT * FROM `genero`");
$tipos=$obj->consultar("SELECT * FROM `tipo`");
?>
<br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Registro del Anime</h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <label for="" style="width:30%;">Nombre del anime: </label>
                        <input required type="text" name="nombre">
                        <br>
                        <label for="" style="width:30%;">Imagen del anime: </label>
                        <input class="from-comtrol" type="file" name="img">
                        <br>
                        <label for="" style="width:30%;">Estado:</label>
                        Terminado <input class="from-comtrol" type="radio" name="estado" value="0">
                        En Proceso <input class="from-comtrol" type="radio" name="estado" value="1">
                        <br>
                        <label for="" style="width:30%;">Descripcion</label>
                        <textarea class="form-control" type="textarea" name="descripcion" rows="3" id=""></textarea>
                        <br>
                        <div class="form-group form-group-inline">
                            <label style="width:30%;">Genero:</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Seleccione un genero</option>
                                <?php
                                foreach($generos as $individual){
                                ?>
                                <option value="<?php echo $individual['idg']?>"><?php echo $individual['nombreg']?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <br>
                        <div class="form-group form-group-inline">
                            <label for="" style="width:30%;">Tipo:</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Seleccione un tipo</option>
                                <?php
                                foreach($tipos as $tipo){
                                ?>
                                <option value="<?php echo $tipo['idt']?>"><?php echo $tipo['nombret']?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <form method="post">
                        Temporadas del anime
                        <br>
                        <div class="input-group">
                            <input type="number" name="Notemporadaa" id="" min="1" required value="1">
                            <div class="input-group-append">
                                <input class="btn btn-success" type="submit" name="Enviar1" value="Enviar T">
                            </div>
                        </div>
                        <br>
                        <label for="" style="width:30%;">No. Temporada:</label>
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
                        <label for="" style="width:30%;">Capitulos de la temp. <?php echo $i; ?>: </label>
                        <input type="number" name="<?php echo $cap;?>" min="1">
                        <br>
                        <?php
                        }
                        ?>

                        <br>
                        Ultima temporada vista
                        <br>
                        Temporada: <input type="number" name="temporadav" id="">
                        <br>
                        capitulo: <input type="number" name="capitulosv" id="">
                    </form>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <p>
                <input class="btn btn-success" type="submit" name="Enviar2" value="Guardar anime">
            </p>
        </div>
    </div>
</div>
</div>

<?php include('./footer.php') ?>