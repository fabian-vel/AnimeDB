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
        <form method="post" enctype="multipart/form-data" id="formulario">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-body">
                        <label for="" style="width:30%;">Nombre del anime: </label>
                        <input type="text" name="nombre">
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
                            <div class="from-checkbox">
                                <?php
                                foreach($generos as $individual){
                                ?>
                                <input class="form-check-input" type="checkbox" name="genero[]"
                                    value="<?php echo $individual['idg']?>" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <?php echo $individual['nombreg']?>
                                </label>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="form-group form-group-inline">
                            <label for="" style="width:30%;">Tipo:</label>
                            <select class="form-select" aria-label="Default select example" name="tipoA">
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
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        Temporadas del anime
                        <br>

                        <div class="input-group">
                            <input type="number" name="Notemporadaa" id="" min="1" required value="1">
                            <div class="input-group-append">
                                <!---<input class="btn btn-success" type="submit" name="Enviar1" value="Enviar T" formmethod="get"> --->
                                <button class="btn btn-success" type="button" id="enviarTem">Enviar Tem</button>
                            </div>
                        </div>
                        <br>
                        <div id="numTemporada"></div>
                        <script>
                        $("#enviarTem").click(function() {
                            $.ajax({
                                url: "./numeroTemporadas.php",
                                type: "post",
                                data: $("#formulario").serialize(),
                                success: function(resultado) {
                                    $("#numTemporada").html(resultado);
                                }
                            });
                        });
                        </script>
                        <br>
                        Ultima temporada vista
                        <br>
                        Temporada: <input type="number" name="temporadav" id="">
                        <br>
                        capitulo: <input type="number" name="capitulosv" id="">
                        <p>
                            <input class="btn btn-success" type="submit" name="Enviar" value="Guardar anime">
                        </p>
                    </div>
                </div>
            </div>
        </form>
        <div class="card-footer">
        </div>
    </div>
</div>
</div>

<?php include('./footer.php') ?>