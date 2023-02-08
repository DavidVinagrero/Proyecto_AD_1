<html>
    <head>
        <title>Carta actualizada</title>
        <link rel = "StyleSheet" href = "../estilos.css" type = "text/css">
        <?php
            // var_export($_POST);
            require_once("../dbutils.php");
            $myconection = conectarDB();

            if(isset($_POST["accion"])){
                $accionRecuperada = $_POST["accion"];

                if(isset($_POST["imagen"])){
                    $tmp_name = $_FILES["imagen"]["tmp_name"];
                    if($tmp_name != ""){
                        $ruta = "../media/img/".basename($_FILES["imagen"]["name"]);
                        move_uploaded_file($tmp_name, $ruta);
                        //echo "Se ha subido correctamente";
                    }
                }

                if($accionRecuperada == "crear"){
                    $descripcionRecuperada = $_POST["descripcion"];
                    $pagina = $_POST["pagina"];
                    $mazoRecuperado = strtoupper($_POST["mazo"]);
                    $fechaRecuperada = $_POST["anio"];
                    $imagen = $_FILES["imagen"]["name"];

                    if($fechaRecuperada!= "" && $mazoRecuperado!= "" && $imagen!= ""){
                            insertarCarta($myconection, $descripcionRecuperada, $fechaRecuperada, $mazoRecuperado, $imagen);
                            // echo "ok";
                    } else{
                        echo "Faltan uno o varios datos, también puede que ese mazo no exista";
                    }
                } elseif($accionRecuperada == "borrar"){
                    $pagina = $_POST["pagina"];
                    $idRecuperado = $_POST["id_carta"];
                    if($idRecuperado!=""){
                        eliminarCarta($myconection, $idRecuperado);
                    } else{
                        echo "El ID estaba vacío";
                    }
                } else{
                    $idRecuperado = $_POST["id_carta"];
                    $descripcionRecuperada = $_POST["descripcion"];
                    $pagina = $_POST["pagina"];
                    $fechaRecuperada = $_POST["fecha"];
                    if (isset($_POST["imagen"])) {
                        $imagen = $_FILES["imagen"]["name"];
                    }

                    $listaCartasBruto = seleccionarCartas($myconection);
                    $listaID = array();
                    for ($i=0; $i < count($listaCartasBruto); $i++) {
                        array_push($listaID, $listaCartasBruto[$i]["ID"]);
                    }

                    if(in_array($idRecuperado, $listaID)){
                        $listaCartasBrutoID = seleccionarCartasID($myconection, $idRecuperado);
                        $imagenDefecto = $listaCartasBrutoID[0]["IMAGEN"];
                        $descripcionDefecto = $listaCartasBruto[0]["DESCRIPCION"];
                        $fechaDefecto = $listaCartasBruto[0]["ANIO"];
                        $descripcion = "Escribe aquí la nueva descripcion de la carta.";
                        $mazoRecuperado = $_POST["mazo"];
                        
                        if($fechaRecuperada == ""){
                            $fechaRecuperada = $fechaDefecto;
                        }if($imagen == ""){
                            $imagen = $imagenDefecto; 
                        }if(strcmp($descripcionRecuperada, $descripcion) == 0){
                            $descripcionRecuperada = $descripcionDefecto;
                        }
                        modificarCarta($myconection,$idRecuperado,$descripcionRecuperada,$fechaRecuperada,$imagen, $mazoRecuperado);
                    } else{
                        echo "El ID no existe";
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
                              <a href="../index.php"><button class="button-80">VOLVER A ADMIN</button></a>';
                } else{
                        echo '<a href="../index.php"><button class="button-80">VOLVER A ADMIN</button></a>';
                }
            ?>
            
    </body>
</html>