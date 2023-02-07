<htm>
    <head>
        <link rel = "StyleSheet" href = "../estilos.css" type = "text/css">
        <title>Creación mazo</title>
    </head>
    <body>
        <h1>Creación de mazo</h1>
        <form action="mazo_actualizado.php" method="post">
            Nombre: <input type="text" name="nombre" placeholder="Nombre del mazo"/><br>
            <br><textarea name="descripcion" rows="10" cols="30">Escribe aquí la descripción del mazo.</textarea><br><br>
            <button class="button-80" style="margin-left: 5%;">Crear</button>
            <input type="hidden" name="accion" value="crear"/>
            <input type="hidden" name="pagina" value="crear"/>
        </form>
    </body>
</htm>