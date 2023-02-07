<html>
    <head>
        <link rel = "StyleSheet" href = "admin/estilos.css" type = "text/css">
        <title>Time line</title>
        <?php 
             require_once("admin/dbutils.php");
             $myconection = conectarDB();

            $listaMazosBruto = seleccionarMazos($myconection);
            $listaMazosFiltrada = array();
            for ($i=0; $i < count($listaMazosBruto); $i++) {
                array_push($listaMazosFiltrada, $listaMazosBruto[$i]["NOMBRE"]);
            }
        ?>
    </head>
    <body>
        <center>
        <form method="post" action="dummy.php">
            <h1>TIME-LINE</h1>
            Selecciona un mazo para jugar:<br><br>
            <select name="nombre">
                <?php
                    for ($i = 0; $i < count($listaMazosBruto); $i++) {
                        echo "<option value='$listaMazosFiltrada[$i]'>$listaMazosFiltrada[$i]</option>";
                    }
                ?>
            </select><br><br>
            <button class="button-80">Jugar</button>
        </form>
        </center>
    </body>
</html>
