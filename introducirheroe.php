<?php
include("conexion.php");

$nombre = $_POST['nombre'];
$atributo = $_POST['atributo'];
$n_casa = $_POST['n_casa'];

$carpeta = "icons/";

$iconoactual = $carpeta . $_POST['icono'];
$extension = pathinfo($iconoactual, PATHINFO_EXTENSION);
$icono = $carpeta . uniqid("img_H_") . '.' . $extension;
if (file_exists($iconoactual)) {
    if (rename($iconoactual, $icono)) {
        echo "Archivo renombrado a: " . basename($icono);
    } else {
        echo "Error al renombrar el archivo.";
    }
} else {
    echo "El archivo original no existe.";
}

$stmt = $con->prepare("INSERT INTO heroes (nombre, atributo, n_casa, icono) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombre, $atributo, $n_casa,
$icono);
if ($stmt->execute()) {
    echo "Nuevo héroe introducido correctamente.";
} else {
    echo "Error al introducir el héroe: " . $stmt->error;
}

$con->close();
?>
<meta http-equiv="refresh" content="3;url=formularioheroes.html">