<html>

<head>
    <title>Modificar carta</title>
    <link rel="StyleSheet" href="../estilos.css" type="text/css">
    <?php
    require_once("../dbutils.php");
    $myconection = conectarDB();

    $myconection = conectarDB();

    $listaCartasBruto = seleccionarCartas($myconection);
    $listaID = array();
    $listaFecha = array();
    $listaDescripcion = array();
    $listaImagen = array();
    $listaMazosCartas = array();
    //var_dump($listaCartasBruto);
    
    for ($i = 0; $i < count($listaCartasBruto); $i++) {
        array_push($listaID, $listaCartasBruto[$i]["ID"]);
        array_push($listaFecha, $listaCartasBruto[$i]["ANIO"]);
        array_push($listaDescripcion, $listaCartasBruto[$i]["DESCRIPCION"]);
        array_push($listaImagen, $listaCartasBruto[$i]["IMAGEN"]);
        array_push($listaMazosCartas, $listaCartasBruto[$i]["NOMBRE_MAZO"]);
    }

    $listaMazosBruto = seleccionarMazos($myconection);
    $listaMazosFiltrada = array();
    for ($i = 0; $i < count($listaMazosBruto); $i++) {
        array_push($listaMazosFiltrada, $listaMazosBruto[$i]["NOMBRE"]);
    }
    ?>
    <style>
        table {
            margin-top: 10%;
            margin-right: 90%;
            border: 1px solid black;
            width: 400px;
        }

        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <h1>Modificación de carta</h1>
    <form method="post" action="carta_actualizada.php">
        ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="id_carta"
            placeholder="ID de la carta" /><br><br>
        Año: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="fecha" placeholder="Nuevo año" /><br><br>
        Imágen: <input	type="file" name="imagen"/><br><br>
        Mazo:&nbsp;&nbsp;&nbsp;&nbsp;<select name="mazo">
            <?php
            for ($i = 0; $i < count($listaMazosBruto); $i++) {
                echo "<option value='$listaMazosFiltrada[$i]'>$listaMazosFiltrada[$i]</option>";
            }
            ?>
        </select><br><br>
        <textarea name="descripcion" rows="3"
            cols="28">Escribe aquí la nueva descripcion de la carta.</textarea><br><br>
        <button class="button-80">Modificar</button>
        <input type="hidden" name="accion" value="modificar" />
        <input type="hidden" name="pagina" value="modificar" />
    </form>
    <table>
        <tr>
            <th>ID</<th>
            <th>AÑO</th>
            <th>DESCRIPCION</th>
            <th>IMAGEN</th>
            <th>MAZO</th>
        </tr>
        <?php
        for ($i = 0; $i < count($listaCartasBruto); $i++) {
            echo "<tr>";
            echo "<td>$listaID[$i]</td>";
            echo "<td>$listaFecha[$i]</td>";
            echo "<td>$listaDescripcion[$i]</td>";
            echo "<td>$listaImagen[$i]</td>";
            echo "<td>$listaMazosCartas[$i]</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>