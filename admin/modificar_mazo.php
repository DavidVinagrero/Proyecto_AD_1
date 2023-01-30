<htm>
    <head>
        <link rel = "StyleSheet" href = "estilos.css" type = "text/css">
        <title>Modificar mazo</title>
    </head>
    <body>
        <h1>Modificacion de mazo</h1>
        <form action="mazo_actualizado.php" method="post">
            Nombre: <input type="text" name="nombre" placeholder="Nombre del mazo"/><br>
            <br><textarea name="descripcion" rows="10" cols="30">Escribe aquí la nueva descripcion del mazo.</textarea><br><br>
            <button class="button-80" style="margin-left: 5%;">Modificar</button>
            <input type="hidden" name="accion" value="modificar"/>
            <input type="hidden" name="pagina" value="modificar"/>
        </form>
    </body>
</htm>