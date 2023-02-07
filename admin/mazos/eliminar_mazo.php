<htm>
    <head>
        <link rel = "StyleSheet" href = "../estilos.css" type = "text/css">
        <title>Eliminar mazo</title>
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
        <h1>Eliminación de mazo</h1>
        <form action="mazo_actualizado.php" method="post">
        <select name="nombre">
            <?php
                for ($i = 0; $i < count($listaMazosBruto); $i++) {
                    echo "<option value='$listaMazosFiltrada[$i]'>$listaMazosFiltrada[$i]</option>";
                }
            ?>
        </select><br><br>
            <button class="button-80" >Eliminar</button>
            <input type="hidden" name="accion" value="borrar"/>
            <input type="hidden" name="pagina" value="eliminar"/>
        </form>
    </body>
</htm>