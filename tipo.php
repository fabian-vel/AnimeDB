<?php
    include('./header.php');
    include('./connection/connection.php');
    include('./action/recordDataTipo.php');
?>
<br>
<div class="card">
    <h5 class="card-header">Registo de tipo</h5>
    <div class="card-body">
        <form action="" method="post">
            <label for="">Nombre del Tipo</label>
            <input required type="text" name="nombret" class="form-control">
            <br>
            <label for="">Descripcion</label>
            <textarea type="textarea" class="form-control" name="descripciont" rows="3"></textarea>
            <br>
            <p>
                <input type="submit" value="Guardar" name="EnviarT" class="btn btn-success">
            </p>
        </form>
    </div>
</div>
<?php
    include('./footer.php');
?>