<html>
    <head>
        <title>Subir archivos</title>
        <link rel = "StyleSheet" href = "../estilos.css" type = "text/css">
        <?php 
            if(isset($_POST["button_a"])){
                $tmp_name = $_FILES["input_imagen"]["tmp_name"];
                if($tmp_name != ""){
                    $ruta = "../media/img/".basename($_FILES["input_imagen"]["name"]);
                    move_uploaded_file($tmp_name, $ruta);
                    echo "Se ha subido correctamente";
                }
            }
        ?>
    </head>
    <body>
        <h1>Subir imágenes</h1>
       <form method="post" action="subir_imagen_carta.php" enctype="multipart/form-data">
       Subir archivo:
        <input	type="file" name="imagen"/><br><br>
        <button type="submit" value="button_a" class="button-80" name="button_a">Subir</button>
    </form>
    <a href="../index.php"><button class="button-80" type="menu">Volver a admin</button></a>
    </body>
</html>