<label for="" style="width:30%;">No. Temporada:</label>
<br>
<?php
$num = 1;
$num = $_POST['Notemporadaa'];
?>
<input type="hidden" name="tempor" value="<?php echo $num; ?>">
<?php
for ($i = 1; $i <= $num; $i++) {
    $cap = "capitulos" . $i;
    ?>
<label for="" style="width:30%;">Capitulos de la temp. <?php echo $i; ?>: </label>
<input type="number" name="<?php echo $cap; ?>" min="1">
<br>
<?php
}
?>