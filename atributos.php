<?php
include ("conexion.php");
$sql = "SELECT atributo, COUNT(*) FROM heroes GROUP BY atributo HAVING COUNT(*) > 1";
$result = $con->query($sql);

while ($row = $result->fetch_assoc()) {
?>
    <option value="<?php echo $row['atributo']; ?>"><?php echo $row['atributo']; ?></option>
<?php
}
?>