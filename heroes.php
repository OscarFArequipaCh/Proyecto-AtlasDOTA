<?php
include("conexion.php");

$atributo = $_GET['atributo'];

// $stmt = $con->prepare("SELECT id, faccion, atributo, numero FROM casas WHERE atributo = ?");
// $stmt->bind_param("s", $atributo);
// $stmt->execute();

$sql = "SELECT id, faccion, atributo, numero from casas WHERE atributo = '$atributo' ORDER BY faccion ASC, numero ASC";
$result = mysqli_query($con, $sql);

$sql = "SELECT id, nombre, atributo, n_casa, icono FROM heroes WHERE atributo = '$atributo' ORDER BY nombre ASC";
$resulth = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document 1</title>
    <link rel="stylesheet" href="stylesmain.css">
</head>
<body>
    <div class="container">
        <nav class="topbar">
            <a href="heroes.php">Heroes</a>
            <a href="#">Objetos</a>
            <a href="#">Tutoriales</a>
            <a href="formularioheores.php">Añadir</a>
            <!-- <ul>
                <li><a href="#">Heroes</a></li>
                <li><a href="#">Objetos</a></li>
                <li><a href="#">Tutoriales</a></li>
            </ul> -->
        </nav>
        <nav class="sidebar">
            <a href="heroes.php?atributo=fuerza">Fuerza</a>
            <a href="heroes.php?atributo=agilidad">Agilidad</a>
            <a href="heroes.php?atributo=inteligencia">Inteligencia</a>
        </nav>

        <div class="content">
            <?php
            foreach ($result as $row) {
            ?>
            <div class="grid-container" style="background-color: <?php echo ($row['faccion'] == 'Sentinel') ? 'Red' : 'Green'; ?>;">
                <table>
                    <!-- <tr>
                        <//?php
                        mysqli_data_seek($resulth, 0); // Reset the result pointer to the beginning
                        while ($rowh = mysqli_fetch_assoc($resulth)) {
                            if ($row['atributo'] == $rowh['atributo'] && $row['id'] == $rowh['n_casa']) {
                        ?>
                        <td><a href="pagina1.html" class="image-button">
                            <img src="<//?php echo $rowh['icono']; ?>" alt="<//?php echo $rowh['nombre']; ?>">
                            <div class="image-caption"><//?php echo $rowh['nombre']; ?></div></a>
                        </td>
                        <//?php
                            }
                        }
                        ?>
                    </tr> -->
                    <?php
                        mysqli_data_seek($resulth, 0); // Reset pointer
                        // Filtrar héroes de la casa actual
                        $heroesCasa = [];
                        while ($rowh = mysqli_fetch_assoc($resulth)) {
                            if ($row['atributo'] == $rowh['atributo'] && $row['id'] == $rowh['n_casa']) {
                                $heroesCasa[] = $rowh;
                            }
                        }
                        // Mostrar en filas de 4 columnas
                        $col = 0;
                        echo "<tr>";
                        foreach ($heroesCasa as $hero) {
                            echo "<td><a href='pagina1.html' class='image-button'>
                                    <img src='{$hero['icono']}' alt='{$hero['nombre']}'>
                                    <div class='image-caption'>{$hero['nombre']}</div>
                                </a></td>";
                            $col++;
                            if ($col % 4 == 0) echo "</tr><tr>";
                        }
                        // Cerrar fila si quedó incompleta
                        if ($col % 4 != 0) echo str_repeat("<td></td>", 4 - ($col % 4)) . "</tr>";

                        // Alternativamente, usar array_chunk para dividir en filas de 4
                        /*foreach (array_chunk($heroesCasa, 4) as $fila) {
                            echo "<tr>";
                            foreach ($fila as $hero) {
                                echo "<td><a href='pagina1.html' class='image-button'>
                                    <img src='{$hero['icono']}' alt='{$hero['nombre']}'>
                                    <div class='image-caption'>{$hero['nombre']}</div>
                                </a></td>";
                            }
                            echo "</tr>";
                        }*/
                    ?>
                </table>
            </div>
            <?php
            }
            ?>           
        </div>
    </div>     
</body>
</html>