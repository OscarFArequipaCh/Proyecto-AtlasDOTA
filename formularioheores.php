<?php
    include("conexion.php");
    $sql = "SELECT id, faccion, atributo, numero from casas";
    $result = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
                    <select name="atributo" required>  
                        <option value="fuerza">Fuerza</option>
                        <option value="agilidad">Agilidad</option>
                        <option value="inteligencia">Inteligencia</option>
                    </select>
                </td>
                <td>
                    <select name="n_casa" require>
                    <?php
                        mysqli_data_seek($result, 0); // Reset the result pointer
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['atributo'] . " - " . $row['faccion'] . " - " . $row['numero']; ?></option>
                    <?php
                        }
                    ?>
                    </select>
                </td>
                <td><input type="text" name="icono"></td>
            </tr>
        </table>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>