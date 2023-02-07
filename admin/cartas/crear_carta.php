<html>
    <head>
        <link rel = "StyleSheet" href = "../estilos.css" type = "text/css">
        <title>Crear carta</title>
        <?php 
            require_once("../dbutils.php");
            $myconection = conectarDB();
        
            $listaMazosBruto = seleccionarMazos($myconection);
            $listaMazosFiltrada = array();
            for ($i=0; $i < count($listaMazosBruto); $i++) {
                array_push($listaMazosFiltrada, $listaMazosBruto[$i]["NOMBRE"]);
            }
        ?>
    </head>
    <body>
        <h1>Creación de carta</h1><br>
        <form action="carta_actualizada.php" method="post">
            <textarea name="descripcion" rows="3" cols="24">Escribe aquí una brebe explicacion de tu carta.</textarea><br><br>
            Mazo: <select name="mazo">
            <?php
                for ($i = 0; $i < count($listaMazosBruto); $i++) {
                    echo "<option value='$listaMazosFiltrada[$i]'>$listaMazosFiltrada[$i]</option>";
                }
            ?>
        </select><br><br> 
            Fecha: <input type="text" name="anio" placeholder="Año del suceso"/><br><br>
            Imágen: <input	type="file" name="imagen"/><br><br>
            <button class="button-80" style="margin-left: 5%;">Crear</button>
            <input type="hidden" name="accion" value="crear"/>
            <input type="hidden" name="pagina" value="crear"/>
        </form>
    </body>
</html>