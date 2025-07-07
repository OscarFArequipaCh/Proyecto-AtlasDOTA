<?php
include("conexion.php");

$atributo = $_GET['atributo'];

// $stmt = $con->prepare("SELECT id, faccion, atributo, numero FROM casas WHERE atributo = ?");
// $stmt->bind_param("s", $atributo);
// $stmt->execute();

$sql = "SELECT id, faccion, atributo, numero from casas WHERE atributo = '$atributo' ORDER BY numero ASC";
$result = mysqli_query($con, $sql);
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
            <a href="#">Heroes</a>
            <a href="#">Objetos</a>
            <a href="#">Tutoriales</a>
            <!-- <ul>
                <li><a href="#">Heroes</a></li>
                <li><a href="#">Objetos</a></li>
                <li><a href="#">Tutoriales</a></li>
            </ul> -->
        </nav>
        <nav class="sidebar">
            <a href="#">Fuerza</a>
            <a href="#">Agilidad</a>
            <a href="#">Inteligencia</a>
        </nav>

        <div class="content">
            <div class="grid-container">
                <table>
                    <tr>
                        <td><a href="pagina1.html" class="image-button">
                            <img src="icons/Salto Oscuro.png" alt="Opción 1">
                            <div class="image-caption">Opción 1</div></a>
                        </td>
                        <td><a href="pagina3.html" class="image-button">
                            <img src="icons/Salto Oscuro.png" alt="Opción 3">
                            <div class="image-caption">Opción 3</div>
                            </a>
                        </td>
                        <td><a href="pagina2.html" class="image-button">
                            <img src="icons/Salto Oscuro.png" alt="Opción 2">
                            <div class="image-caption">Opción 2</div>
                            </a>
                        </td>
                        <td><a href="pagina4.html" class="image-button">
                            <img src="icons/Salto Oscuro.png" alt="Opción 4">
                            <div class="image-caption">Opción 4</div>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="pagina5.html" class="image-button">
                            <img src="icons/Salto Oscuro.png" alt="Opción 5">
                            <div class="image-caption">Opción 5</div>
                            </a>
                        </td>
                        <td><a href="pagina6.html" class="image-button">
                            <img src="icons/Salto Oscuro.png" alt="Opción 6">
                            <div class="image-caption">Opción 6</div>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="grid-container">
                <table>
                    <tr>
                        <td><a href="pagina8.html" class="image-button">
                            <img src="icons/Salto Oscuro.png" alt="Opción 1">
                            <div class="image-caption">Opción 1</div></a>
                        </td>
                        <td><a href="pagina9.html" class="image-button">
                            <img src="icons/Salto Oscuro.png" alt="Opción 3">
                            <div class="image-caption">Opción 3</div>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="pagina10.html" class="image-button">
                            <img src="icons/Salto Oscuro.png" alt="Opción 5">
                            <div class="image-caption">Opción 5</div>
                            </a>
                        </td>
                        <td><a href="pagina11.html" class="image-button">
                            <img src="icons/Salto Oscuro.png" alt="Opción 6">
                            <div class="image-caption">Opción 6</div>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="grid-container">

            </div>
            <div class="grid-container">
                
            </div>   
        </div>
    </div>  
    
</body>
</html>