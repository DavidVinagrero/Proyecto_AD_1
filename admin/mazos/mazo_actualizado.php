<html>
    <head>
        <title>Mazo actualizado</title>
        <link rel = "StyleSheet" href = "../estilos.css" type = "text/css">
        <?php 
            // var_export($_POST);
            require_once("../dbutils.php");
            $myconection = conectarDB();

            if(isset($_POST["nombre"])){
            $nombreRecuperado = strtoupper($_POST["nombre"]);
            $accionRecuperada = $_POST["accion"];
            $pagina = $_POST["pagina"];

            if($nombreRecuperado!=""){
                if($accionRecuperada == "crear"){
                    $descripcionRecuperada = $_POST["descripcion"];
                    insertarMazo($myconection, $nombreRecuperado, $descripcionRecuperada);
                } elseif($accionRecuperada == "borrar"){
                    eliminarMazo($myconection, $nombreRecuperado);
                } else{
                    $descripcionRecuperada = $_POST["descripcion"];
                    modificarMazo($myconection, $nombreRecuperado, $descripcionRecuperada);
                }
            } else{
                echo "No has puesto nombre en el mazo";
            }
            }
            
        ?>
    </head>
    <body>
            <br><br>
            <?php 
                if(isset($_POST["pagina"])){
                        echo '<a href="'.$pagina.'_mazo.php"><button class="button-80">VOLVER ATRÁS</button></a>
                              <a href="../index.php"><button class="button-80">VOLVER A ADMIN</button></a>';
                } else{
                        echo '<a href="../index.php"><button class="button-80">VOLVER A ADMIN</button></a>';
                }
            ?>
            
    </body>
</html>