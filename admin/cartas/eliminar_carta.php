<html>
    <head>
        <title>Eliminar carta</title>
        <link rel = "StyleSheet" href = "../estilos.css" type = "text/css">
        <?php 
            require_once("../dbutils.php");
            $myconection = conectarDB();

            $listaCartasBruto = seleccionarCartas($myconection);
            $listaID = array();
            $listaFecha = array();
            $listaDescripcion = array();
            
            for ($i=0; $i < count($listaCartasBruto); $i++) {
                array_push($listaID, $listaCartasBruto[$i]["ID"]);
                array_push($listaFecha, $listaCartasBruto[$i]["ANIO"]);
                array_push($listaDescripcion, $listaCartasBruto[$i]["DESCRIPCION"]);
            }

            // var_dump($listaCartasBruto);

        ?>
        <style>
            .div1{
                float: left;
            }
            .div2{
                float: right;
            }
            table{
                margin-top: 10%;
                margin-right: 90%;
                border:1px solid black;
                width: 400px;
            }
            td{
                border: 1px solid black;
            }

        </style>
    </head>
    <body>
        <div class="div1">
            <h1>Eliminación de carta</h1>
            <form action="carta_actualizada.php" method="post">
                ID: <input type="number" name="id_carta" placeholder="ID de la carta"/><br><br>
                <button class="button-80" >Eliminar</button>
                <input type="hidden" name="accion" value="borrar"/>
                <input type="hidden" name="pagina" value="eliminar"/>
            </form>
            <table>
                <tr>
                    <th>ID</<th>
                    <th>AÑO</th>
                    <th>DESCRIPCION</th>
                </tr>
                <?php
                    for ($i = 0; $i < count($listaCartasBruto); $i++) {
                        echo "<tr>";
                        echo "<td>$listaID[$i]</td>";
                        echo "<td>$listaFecha[$i]</td>";
                        echo "<td>$listaDescripcion[$i]</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </body>
</html>