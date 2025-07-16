<?php
    include("conexion.php");
    $sql = "SELECT id, faccion, atributo, numero from casas";
    $result = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario múltiple de héroes</title>
    <style>
        table, td, th { border: 1px solid black; border-collapse: collapse; padding: 8px; }
        input, select { width: 100%; }
    </style>
</head>
<body>
    <h1>Registrar Héroes</h1>
<form action="introducirheroe.php" method="post">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>atributo principal</th>
                    <th>numero de casa</th>
                    <th>Icono</th>
                </tr>
            </thead>
            <tr>
                <td><input type="text" name="nombre"></td>
                <td>
                    <!-- <select name="atributo" required>  
                        <option value="fuerza">Fuerza</option>
                        <option value="agilidad">Agilidad</option>
                        <option value="inteligencia">Inteligencia</option>
                    </select> -->
                    <label for="atributo">Atributo</label>
                    <select name="atributo" id="atributo" onchange="obtenerCasas()">
                    </select>
                        <!-- Las opciones se llenarán con JavaScript -->
                </td>
                <td>
                    <label for="n_casa">Casa</label>
                    <select name="n_casa" id="n_casa">
                    <!-- <select name="n_casa" require>
                    <//?php
                        mysqli_data_seek($result, 0); // Reset the result pointer
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <option value="<//?php echo $row['id']; ?>"><//?php echo $row['atributo'] . " - " . $row['faccion'] . " - " . $row['numero']; ?></option>
                    <//?php
                        }
                    ?> -->
                    </select>
                </td>
                <td><input type="text" name="icono"></td>
            </tr>
        </table>
        <input type="submit" value="Enviar">
    </form>
    

</body>
</html>
