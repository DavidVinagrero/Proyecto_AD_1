<html>
    <head>
        <link rel = "StyleSheet" href = "estilos.css" type = "text/css">
        <title>Crear carta</title>
    </head>
    <body>
        <h1>Creación de carta</h1><br>
        <form action="carta_actualizada.php" method="post">
            <textarea name="descripcion" rows="3" cols="24">Escribe aquí una brebe explicacion de tu carta.</textarea><br><br>
            Mazo: &nbsp;<input type="text" name="mazo" placeholder="Al que pertenece"/><br><br>
            Fecha: <input type="text" name="anio" placeholder="Año del suceso"/><br><br>
            <input type="text" placeholder="URL de la imagen" size="34" name="imagen"/> <br><br>
            <button class="button-80" style="margin-left: 5%;">Crear</button>
            <input type="hidden" name="accion" value="crear"/>
            <input type="hidden" name="pagina" value="crear"/>
        </form>
    </body>
</html>