<?php
include("conexion.php");

$nombres   = $_POST['nombre'];
$atributos = $_POST['atributo'];
$n_casas   = $_POST['n_casa'];
$iconos    = $_POST['icono'];

$carpeta = "icons/";
$total = count($nombres);
$errores = 0;

for ($i = 0; $i < $total; $i++) {
    $nombre   = $nombres[$i];
    $atributo = $atributos[$i];
    $n_casa   = $n_casas[$i];
    $nombreIconoOriginal = $iconos[$i];

    // Verifica si el nombre del icono no está vacío
    if (empty($nombreIconoOriginal)) {
        echo "Fila $i: El nombre del archivo de icono está vacío.<br>";
        $errores++;
        continue;
    }

    $iconoActual = $carpeta . $nombreIconoOriginal;
    $extension = pathinfo($iconoActual, PATHINFO_EXTENSION);

    // Generar nuevo nombre
    $nuevoNombre = uniqid("img_H_") . '.' . $extension;
    $iconoDestino = $carpeta . $nuevoNombre;

    // Verificar y renombrar imagen si existe
    if (file_exists($iconoActual)) {
        if (!rename($iconoActual, $iconoDestino)) {
            echo "Fila $i: Error al renombrar la imagen.<br>";
            $errores++;
            continue;
        }
    } else {
        echo "Fila $i: El archivo $iconoActual no existe.<br>";
        $errores++;
        continue;
    }

    // Insertar en la base de datos
    $stmt = $con->prepare("INSERT INTO heroes (nombre, atributo, n_casa, icono) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $atributo, $n_casa, $iconoDestino);

    if (!$stmt->execute()) {
        echo "Fila $i: Error al insertar: " . $stmt->error . "<br>";
        $errores++;
    } else {
        echo "Fila $i: Héroe insertado correctamente.<br>";
    }

    $stmt->close();
}

$con->close();

if ($errores === 0) {
    echo "<br>✅ Todos los héroes se insertaron correctamente.";
} else {
    echo "<br>⚠️ Algunos héroes no se insertaron. Revisa los mensajes de error.";
}
?>

<!-- Redirección después de 5 segundos -->
<meta http-equiv="refresh" content="5;url=formularioheores.php">



<?php
// include("conexion.php");

// $nombre = $_POST['nombre'];
// $atributo = $_POST['atributo'];
// $n_casa = $_POST['n_casa'];

// $carpeta = "icons/";

// $iconoactual = $carpeta . $_POST['icono'];
// $extension = pathinfo($iconoactual, PATHINFO_EXTENSION);
// $icono = $carpeta . uniqid("img_H_") . '.' . $extension;
// if (file_exists($iconoactual)) {
//     if (rename($iconoactual, $icono)) {
//         echo "Archivo renombrado a: " . basename($icono);
//     } else {
//         echo "Error al renombrar el archivo.";
//     }
// } else {
//     echo "El archivo original no existe.";
// }

// $stmt = $con->prepare("INSERT INTO heroes (nombre, atributo, n_casa, icono) VALUES (?, ?, ?, ?)");
// $stmt->bind_param("ssss", $nombre, $atributo, $n_casa,
// $icono);
// if ($stmt->execute()) {
//     echo "Nuevo héroe introducido correctamente.";
// } else {
//     echo "Error al introducir el héroe: " . $stmt->error;
// }

// $con->close();
?>
