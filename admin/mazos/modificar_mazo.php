<htm>
    <head>
        <link rel = "StyleSheet" href = "../estilos.css" type = "text/css">
        <title>Modificar mazo</title>
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
        <h1>Modificacion de mazo</h1>
        <form action="mazo_actualizado.php" method="post">
        <select name="nombre">
            <?php
                for ($i = 0; $i < count($listaMazosBruto); $i++) {
                    echo "<option value='$listaMazosFiltrada[$i]'>$listaMazosFiltrada[$i]</option>";
                }
            ?>
        </select><BR>
            <br><textarea name="descripcion" rows="10" cols="30">Escribe aquí la nueva descripcion del mazo.</textarea><br><br>
            <button class="button-80" style="margin-left: 5%;">Modificar</button>
            <input type="hidden" name="accion" value="modificar"/>
            <input type="hidden" name="pagina" value="modificar"/>
        </form>
    </body>
</htm>