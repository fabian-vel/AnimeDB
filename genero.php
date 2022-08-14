<?php
    include('./header.php');
    include('./connection/connection.php');
    include('./action/recordDataGenero.php');
?>
<br>
<div class="card">
    <h5 class="card-header">Registo de genero</h5>
    <div class="card-body">
        <form action="" method="post">
            <label for="">Nombre del Genero</label>
            <input required type="text" name="nombreg" class="form-control">
            <br>
            <label for="">Descripcion</label>
            <textarea type="textarea" class="form-control" name="descripciong" rows="3"></textarea>
            <br>
            <p>
                <input type="submit" value="Guardar" name="EnviarG" class="btn btn-success">
            </p>
        </form>
    </div>
</div>
<?php
    include('./footer.php');
?>