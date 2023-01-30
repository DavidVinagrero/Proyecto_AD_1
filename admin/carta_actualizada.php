<html>
    <head>
        <title>Carta actualizada</title>
        <link rel = "StyleSheet" href = "estilos.css" type = "text/css">
        <?php
            // var_export($_POST);
            require_once("dbutils.php");
            $myconection = conectarDB();

            if(isset($_POST["accion"])){
                $accionRecuperada = $_POST["accion"];

                if($accionRecuperada == "crear"){
                    $descripcionRecuperada = $_POST["descripcion"];
                    $pagina = $_POST["pagina"];
                    $mazoRecuperado = strtoupper($_POST["mazo"]);
                    $fechaRecuperada = $_POST["anio"];
                    $imagen = $_POST["imagen"];
                    $listaMazosBruto = seleccionarMazos($myconection);
                    $listaMazosFiltrada = array();

                    for ($i=0; $i < count($listaMazosBruto); $i++) {
                        array_push($listaMazosFiltrada, $listaMazosBruto[$i]["NOMBRE"]);
                    }

                    if($fechaRecuperada!= "" && $mazoRecuperado!= "" && $imagen!= "" && in_array($mazoRecuperado, $listaMazosFiltrada)){
                            insertarCarta($myconection, $descripcionRecuperada, $fechaRecuperada, $mazoRecuperado, $imagen);
                            // echo "ok";
                    } else{
                        echo "Faltan uno o varios datos, también puede que ese mazo no exista";
                    }
                } else{
                    $pagina = $_POST["pagina"];
                    $idRecuperado = $_POST["id_carta"];
                    if($idRecuperado!=""){
                        eliminarCarta($myconection, $idRecuperado);
                    } else{
                        echo "El ID estaba vacío";
                    }
                } 
            }
            
        ?>
    </head>
    <body>
            <br><br>
            <?php 
                if(isset($_POST["pagina"])){
                        echo '<a href="'.$pagina.'_carta.php"><button class="button-80">VOLVER ATRÁS</button></a>
                              <a href="index.php"><button class="button-80">VOLVER A ADMIN</button></a>';
                } else{
                        echo '<a href="index.php"><button class="button-80">VOLVER A ADMIN</button></a>';
                }
            ?>
            
    </body>
</html>