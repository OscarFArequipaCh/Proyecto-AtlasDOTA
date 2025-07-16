<?php
include("conexion.php");
$atributo = $_GET['atributo'];
$sql = "SELECT id, faccion, atributo, numero FROM casas WHERE atributo='$atributo'";

$result = $con->query($sql);



mysqli_data_seek($result, 0); // Reset the result pointer
while ($row = mysqli_fetch_array($result)) {
?>
    <option value="<?php echo $row['id']; ?>"><?php echo $row['faccion'] . " - " . $row['numero']; ?></option>
<?php
}
?>