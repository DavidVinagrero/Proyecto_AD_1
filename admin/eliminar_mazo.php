<htm>
    <head>
        <link rel = "StyleSheet" href = "estilos.css" type = "text/css">
        <title>Eliminar mazo</title>
    </head>
    <body>
        <h1>Eliminación de mazo</h1>
        <form action="mazo_actualizado.php" method="post">
            Nombre: <input type="text" name="nombre" placeholder="Nombre a borrar"/><br><br>
            <button class="button-80" >Eliminar</button>
            <input type="hidden" name="accion" value="borrar"/>
            <input type="hidden" name="pagina" value="eliminar"/>
        </form>
    </body>
</htm>