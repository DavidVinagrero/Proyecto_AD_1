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
            table{
                /* font-family:"PressStart"; */
                /* font-family:"VT323"; */
                font-family:"Silkscreen";
            }
        </style>
    </head>
    <body>
        <center>
            <form action="puntuacion.php" method="post">
                
                    <?php
                        $aux = 0;
                        if(isset($_POST["puntos"])){// Si viene del dummy y existe puntos
                            echo '<table class="tabla_puntuacion">
                            <tr>
                                <th>POSI</th>
                                <th>NOMB</th>
                                <th>PUNT</th>
                            </tr>';
                            if(count($listaNombres) >= 10){// Si hay mas de 10 puntuaciones
                                $pasado = true;
                                $aux = 0;
                                $con = 0;

                                for ($i=0; $i < 10; $i++) { 
                                    echo "<tr>" ;
                                    if($con != 0){
                                        echo "<td>".($con+1).".</td>"; // Posición
                                        $con++;
                                    } else {
                                        echo "<td>".($i+1).".</td>"; // Posición
                                    }
                                    // SI está entre dos valores
                                    if ($puntos > $listaPuntos[$i] && $puntos < $aux && $pasado == true) {
                                        echo '<td><input type="text" class="nombre_input" maxlength="1" name="nombre_uno"/>
                                                <input type="text" class="nombre_input" maxlength="1" name="nombre_dos"/>
                                                <input type="text" class="nombre_input" maxlength="1" name="nombre_tres"/></td>' ;
                                        echo "<td>$puntos</td>";
                                        $pasado = false;
                                        $con = $i+2;
                                        echo "<tr><td>".($i+2).".</td>
                                                <td>".$listaNombres[$i]."</td>
                                                <td>".$listaPuntos[$i]."</td></tr>";
                                    }
                                    // SI es el valor más alto
                                    elseif ($puntos > $listaPuntos[$i] && $i == 0) {
                                        echo '<td><input type="text" class="nombre_input" maxlength="1" name="nombre_uno"/>
                                                <input type="text" class="nombre_input" maxlength="1" name="nombre_dos"/>
                                                <input type="text" class="nombre_input" maxlength="1" name="nombre_tres"/></td>' ;
                                        echo "<td>$puntos</td>";
                                        $pasado = false;
                                        $con = $i+2;
                                        echo "<tr><td>".($i+2).".</td>
                                                <td>".$listaNombres[$i]."</td>
                                                <td>".$listaPuntos[$i]."</td></tr>"; 
                                    } 
                                    // SI es el valor más bajo
                                    elseif ($puntos < $listaPuntos[$i] && $i == count($listaNombres)-1) {
                                           
                                        echo '<td><input type="text" class="nombre_input" maxlength="1" name="nombre_uno"/>
                                                <input type="text" class="nombre_input" maxlength="1" name="nombre_dos"/>
                                                <input type="text" class="nombre_input" maxlength="1" name="nombre_tres"/></td>' ;
                                        echo "<td>$puntos</td>";
                                        $pasado = false;
                                    }
                                    // SI es igual a otro
                                    elseif ($puntos == $listaPuntos[$i]) {
                                        echo '<td><input type="text" class="nombre_input" maxlength="1" name="nombre_uno"/>
                                                <input type="text" class="nombre_input" maxlength="1" name="nombre_dos"/>
                                                <input type="text" class="nombre_input" maxlength="1" name="nombre_tres"/></td>' ;
                                        echo "<td>$puntos</td>";
                                        $pasado = false;
                                        $con = $i+2;
                                        echo "<tr><td>".($i+2).".</td>
                                                <td>".$listaNombres[$i]."</td>
                                                <td>".$listaPuntos[$i]."</td></tr>";
                                    }
                                     else{
                                        echo "<td>".$listaNombres[$i]."</td>";
                                        echo "<td>".$listaPuntos[$i]."</td>";
                                    }
                                    echo "</tr>" ;
                                    $aux = $listaPuntos[$i];
                                }

                            } else{
                                $pasado = true;
                                $aux = 0;
                                $con = 0;

                                for ($i=0; $i < count($listaNombres); $i++) {
                                    echo "<tr>" ;
                                    if($con != 0){
                                        echo "<td>".($con+1).".</td>"; // Posición
                                        $con++;
                                    } else {
                                        echo "<td>".($i+1).".</td>"; // Posición
                                    }
                                    
                                    
                                    // SI está entre dos valores
                                    if ($puntos > $listaPuntos[$i] && $puntos < $aux && $pasado == true) {
                                        echo '<td><input type="text" class="nombre_input" maxlength="1" name="nombre_uno"/>
                                                <input type="text" class="nombre_input" maxlength="1" name="nombre_dos"/>
                                                <input type="text" class="nombre_input" maxlength="1" name="nombre_tres"/></td>' ;
                                        echo "<td>$puntos</td>";
                                        $pasado = false;
                                        $con = $i+2;
                                        echo "<tr><td>".($i+2).".</td>
                                                <td>".$listaNombres[$i]."</td>
                                                <td>".$listaPuntos[$i]."</td></tr>";
                                    }
                                    // SI es el valor más alto
                                    elseif ($puntos > $listaPuntos[$i] && $i == 0) {
                                        echo '<td><input type="text" class="nombre_input" maxlength="1" name="nombre_uno"/>
                                                <input type="text" class="nombre_input" maxlength="1" name="nombre_dos"/>
                                                <input type="text" class="nombre_input" maxlength="1" name="nombre_tres"/></td>' ;
                                        echo "<td>$puntos</td>";
                                        $pasado = false;
                                        $con = $i+2;
                                        echo "<tr><td>".($i+2).".</td>
                                                <td>".$listaNombres[$i]."</td>
                                                <td>".$listaPuntos[$i]."</td></tr>"; 
                                    } 
                                    // SI es el valor más bajo
                                    elseif ($puntos < $listaPuntos[$i] && $i == count($listaNombres)-1) {
                                           
                                        echo '<td><input type="text" class="nombre_input" maxlength="1" name="nombre_uno"/>
                                                <input type="text" class="nombre_input" maxlength="1" name="nombre_dos"/>
                                                <input type="text" class="nombre_input" maxlength="1" name="nombre_tres"/></td>' ;
                                        echo "<td>$puntos</td>";
                                        $pasado = false;
                                    }
                                    // SI es igual a otro
                                    elseif ($puntos == $listaPuntos[$i]) {
                                        echo '<td><input type="text" class="nombre_input" maxlength="1" name="nombre_uno"/>
                                                <input type="text" class="nombre_input" maxlength="1" name="nombre_dos"/>
                                                <input type="text" class="nombre_input" maxlength="1" name="nombre_tres"/></td>' ;
                                        echo "<td>$puntos</td>";
                                        $pasado = false;
                                        $con = $i+2;
                                        echo "<tr><td>".($i+2).".</td>
                                                <td>".$listaNombres[$i]."</td>
                                                <td>".$listaPuntos[$i]."</td></tr>";
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
                            
                        } elseif(!isset($_POST["nombre_uno"])){// Si no viene del dummy
                            echo '<table class="tabla_puntuacion">
                            <tr>
                                <th>POSI</th>
                                <th>NOMB</th>
                                <th>PUNT</th>
                            </tr>';
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
                            $puntosInput = $_POST["puntosInput"];
                            $nombreUno = $_POST["nombre_uno"];
                            $nombreDos = $_POST["nombre_dos"];
                            $nombreTres = $_POST["nombre_tres"];
                            if ($nombreUno == "" || $nombreUno == " "){
                                $nombreUno = "-";
                            }if($nombreDos == "" || $nombreDos == " "){
                                $nombreDos = "-";
                            }if($nombreTres == "" || $nombreTres == " "){
                                $nombreTres = "-";
                            }

                            $nombreCompleto = strtoupper($nombreUno.$nombreDos.$nombreTres);

                            insertarPuntuacion($myconection, $nombreCompleto, $puntosInput);

                            $listaPuntuacionesBruto = seleccionarPuntuaciones($myconection);
                            $listaNombres = array();
                            $listaPuntos = array();
                            for ($i=0; $i < count($listaPuntuacionesBruto); $i++) {
                                array_push($listaNombres, $listaPuntuacionesBruto[$i]["NOMBRE"]);
                                array_push($listaPuntos, $listaPuntuacionesBruto[$i]["PUNTOS"]);
                            }
                            
                            if(count($listaNombres) >= 10){
                                echo "<table class='tabla_puntuacion'>";
                                echo '<table class="tabla_puntuacion">
                                    <tr>
                                        <th>POSI</th>
                                        <th>NOMB</th>
                                        <th>PUNT</th>
                                    </tr>';
                                for ($i=0; $i <= 9; $i++) {
                                    echo "<tr>";
                                    echo "<td>".($i+1).".</td>";
                                    echo "<td>$listaNombres[$i]</td>";
                                    echo "<td>$listaPuntos[$i]</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";

                            } else{
                                echo "<table class='tabla_puntuacion'>";
                                for ($i=0; $i < count($listaNombres); $i++) { 
                                    echo "<tr>";
                                    echo "<td>".($i+1).".</td>";
                                    echo "<td>$listaNombres[$i]</td>";
                                    echo "<td>$listaPuntos[$i]</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                            }
                            
                        }
                    ?>
                <?php if(isset($_POST["puntos"])){
                        echo '<input type="hidden" name="puntosInput" value="<?php echo $puntos?>"/>';
                } ?>
                <button class="button-80">ACTUALIZAR</button>
            </form>
            <!-- <a href="dummy.php" style="color: black;">DUMMY</a> -->
        </center>
    </body>
</html>