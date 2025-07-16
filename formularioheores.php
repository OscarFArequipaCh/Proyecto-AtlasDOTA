<!-- <//?php
// conexión para llenar el select de atributos y casas en la fila por defecto
include("conexion.php");
$sql_atributo = "SELECT atributo, COUNT(*) FROM heroes GROUP BY atributo HAVING COUNT(*) > 1";
$res_atributo = mysqli_query($con, $sql_atributo);
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="scriptform.js"></script>
    <style>
        table, td, th { border: 1px solid black; border-collapse: collapse; padding: 8px; }
        input, select { width: 100%; }
    </style>
</head>
<body>
    <nav>
        <a href="index.html">Volver</a>
    </nav>
    <form action="introducirheroe.php" method="post" id="form-heroes">
        <table id="tabla-heroes">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Atributo</th>
                    <th>Casa</th>
                    <th>Icono</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="nombre[]"></td>
                    <td>
                        <select name="atributo[]" class="select-atributo" onchange="actualizarCasas(this)">
                            <option value="">--Seleccionar--</option>
                            <!-- <//?php while ($row = mysqli_fetch_assoc($res_atributo)) { ?>
                                <option value="<//?= $row['atributo'] ?>"><//?= $row['atributo'] ?></option>
                            <//?php } ?> -->
                            <option value="fuerza">Fuerza</option>
                            <option value="agilidad">Agilidad</option>
                            <option value="inteligencia">Inteligencia</option>
                        </select>
                    </td>
                    <td>
                        <select name="n_casa[]" class="select-casa">
                            <option value="">--Casa--</option>
                        </select>
                    </td>
                    <td><input type="text" name="icono[]"></td>
                </tr>
            </tbody>
        </table>

        <button type="button" onclick="agregarFila()">➕ Agregar fila</button>
        <button type="button" onclick="eliminarFila()">➖ Eliminar última fila</button>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
    

</body>
</html>