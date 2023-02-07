<html>
    <head>
        <title>Puntuacion</title>
        <link rel = "StyleSheet" href = "admin/estilos.css" type = "text/css">
        <?php 
            require_once("admin/dbutils.php");
            $myconection = conectarDB();

            if(isset($_POST["puntos"])){
                $puntos = $_POST["puntos"];
            }
            $listaPuntuacionesBruto = seleccionarPuntuaciones($myconection);
            $listaNombres = array();
            $listaPuntos = array();
            for ($i=0; $i < count($listaPuntuacionesBruto); $i++) {
                array_push($listaNombres, $listaPuntuacionesBruto[$i]["NOMBRE"]);
                array_push($listaPuntos, $listaPuntuacionesBruto[$i]["PUNTOS"]);
            }
        ?>
        <style>
            /* table{
                font-family:"PressStart";
            } */
        </style>
    </head>
    <body>
        <center>
            <form action="puntuacion.php" method="post">
                <table>
                    <tr>
                        <th>POSI</th>
                        <th>NOMB</th>
                        <th>PUNT</th>
                    </tr>
                    <?php
                        $aux = 0;
                        if(isset($_POST["puntos"])){// Si viene del dummy y existe puntos
                            if(count($listaNombres) >= 10){// Si hay mas de 10 puntuaciones
                                echo "";

                            } else{
                                $pasado = true;
                                $aux = 0;

                                for ($i=0; $i < count($listaNombres); $i++) {
                                    echo "<tr>" ;
                                    echo "<td>".($i+1).".</td>"; // Posición
                                    
                                    // SI está entre dos valores
                                    if ($puntos > $listaPuntos[$i] && $puntos < $aux && $pasado == true) {
                                        echo "<td>E N T R E</td>" ;
                                        echo "<td>$puntos</td>";
                                        $pasado = false;
                                        echo "<tr><td>".($i+2).".</td>
                                                <td>".$listaNombres[$i]."</td>
                                                <td>".$listaPuntos[$i]."</td></tr>";
                                    }
                                    // SI es el valor más alto
                                    elseif ($puntos > $listaPuntos[$i] && $i == 0) {
                                        echo "<td>M A Y O R</td>" ;
                                        echo "<td>$puntos</td>";
                                        $pasado = false;
                                        echo "<tr><td>".($i+2).".</td>
                                                <td>".$listaNombres[$i]."</td>
                                                <td>".$listaPuntos[$i]."</td></tr>"; 
                                    } 
                                    // SI es el valor más bajo
                                    elseif ($puntos < $listaPuntos[$i] && $i == count($listaNombres)-1) {
                                           
                                        echo "<td>M E N O R</td>" ;
                                        echo "<td>$puntos</td>";
                                        $pasado = false;
                                    }
                                     else{
                                        echo "<td>".$listaNombres[$i]."</td>";
                                        echo "<td>".$listaPuntos[$i]."</td>";
                                    }
                                    echo "</tr>" ;
                                    $aux = $listaPuntos[$i];
                                }
                               /*  echo "<tr><td>".(count($listaNombres)+1).".</td>
                                    <td>".$listaNombres[2]."</td>
                                    <td>".$listaPuntos[2]."</td></tr>" ; */
                            }
                            
                        } else{// Si no viene del dummy
                            if(count($listaNombres) >= 10){
                                for ($i=0; $i <= 9; $i++) {
                                    echo "<tr>";
                                    echo "<td>".($i+1).".</td>";
                                    echo "<td>$listaNombres[$i]</td>";
                                    echo "<td>$listaPuntos[$i]</td>";
                                    echo "</tr>";
                                }
                            } else{
                                for ($i=0; $i < count($listaNombres); $i++) { 
                                    echo "<tr>";
                                    echo "<td>".($i+1).".</td>";
                                    echo "<td>$listaNombres[$i]</td>";
                                    echo "<td>$listaPuntos[$i]</td>";
                                    echo "</tr>";
                                }
                            }
                            
                        }
                    ?>
                </table>
            
                <br><br>
                <?php  
                    if(isset($_POST["nombre_uno"])){
                        $nombreCompleto = strtoupper($_POST["nombre_uno"].$_POST["nombre_dos"].$_POST["nombre_tres"]);
                    }
                ?>
                <button class="button-80">ACTUALIZAR</button>
            </form>
            <a href="dummy.php" style="color: black;">DUMMY</a>
        </center>
    </body>
</html>