<?php

function conectarDB()
{
    try {
        $db = new PDO("mysql:host=localhost;dbname=time_line;charset=utf8mb4", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $ex) {
        echo ("Error al conectar" . $ex->getMessage());
    }
}

function insertarMazo($conDb, $nombre, $descripcion){
    try {
        $db = new PDO("mysql:host=localhost;dbname=time_line;charset=utf8mb4", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO  mazos  ( ID ,  NOMBRE ,  DESCRIPCION ) VALUES (NULL, '$nombre', '$descripcion')";
        $db->exec($sql);
        echo "<h1>Mazo creado satisfactoriamente</h1>";
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
    
    $conDb = null;
}
function eliminarMazo($conDb, $nombre){
    try {
        $db = new PDO("mysql:host=localhost;dbname=time_line;charset=utf8mb4", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM mazos WHERE NOMBRE = '$nombre'";
        $db->exec($sql);
        echo "<h1>Mazo eliminado correctamente</h1>";
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
    
    $conDb = null;
}
function insertarCarta($conDb, $descripcion, $fecha, $mazo, $imagen){
    try {
        $db = new PDO("mysql:host=localhost;dbname=time_line;charset=utf8mb4", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO  cartas  ( ID ,  DESCRIPCION ,  ANIO ,  IMAGEN ,  NOMBRE_MAZO ) VALUES (NULL, '$descripcion', '$fecha', '$imagen', '$mazo');";
        $db->exec($sql);
        echo "<h1>Carta creada satisfactoriamente</h1>";
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }

    $conDb = null;
}
function seleccionarMazos($conDb){
    $vectorTotal = array();
    try
    {
        $sql = "SELECT NOMBRE FROM MAZOS";
        $stmt = $conDb->query($sql);
        while($fila = $stmt->fetch(PDO::FETCH_ASSOC))
        {
        $vectorTotal[]=$fila;
        }
    }
    catch (PDOException $ex)
    {
        echo ("Error al conectar".$ex->getMessage());
    }
    return $vectorTotal;
}
function seleccionarCartas($conDb){
    $vectorTotal = array();
    try
    {
        $sql = "SELECT ID, ANIO, DESCRIPCION, IMAGEN, NOMBRE_MAZO FROM CARTAS";
        $stmt = $conDb->query($sql);
        while($fila = $stmt->fetch(PDO::FETCH_ASSOC))
        {
        $vectorTotal[]=$fila;
        }
    }
    catch (PDOException $ex)
    {
        echo ("Error al conectar".$ex->getMessage());
    }
    return $vectorTotal;
}
function seleccionarCartasID($conDb, $id){
    $vectorTotal = array();
    try
    {
        $sql = "SELECT IMAGEN, DESCRIPCION, ANIO FROM CARTAS WHERE ID = $id";
        $stmt = $conDb->query($sql);
        while($fila = $stmt->fetch(PDO::FETCH_ASSOC))
        {
        $vectorTotal[]=$fila;
        }
    }
    catch (PDOException $ex)
    {
        echo ("Error al conectar".$ex->getMessage());
    }
    return $vectorTotal;
}
function eliminarCarta($conDb, $id){
    try {
        $db = new PDO("mysql:host=localhost;dbname=time_line;charset=utf8mb4", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM cartas WHERE ID = '$id'";
        $db->exec($sql);
        echo "<h1>Carta eliminada correctamente</h1>";
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
    
    $conDb = null;
}
function modificarMazo($conDb, $nombre, $descripcionNueva){
    try {
        $db = new PDO("mysql:host=localhost;dbname=time_line;charset=utf8mb4", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE mazos SET DESCRIPCION = '$descripcionNueva' WHERE NOMBRE = '$nombre';";
        $db->exec($sql);
        echo "<h1>Mazo modificado correctamente</h1>";
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }

    $conDb = null;
}
function modificarCarta($conDb, $id, $descripcionNueva, $fechaNueva, $imagenNueva, $nombreMazo){
    try {
        $db = new PDO("mysql:host=localhost;dbname=time_line;charset=utf8mb4", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE  cartas  SET  DESCRIPCION  = '$descripcionNueva',  ANIO  = '$fechaNueva',  IMAGEN  = '$imagenNueva',
                NOMBRE_MAZO  = '$nombreMazo' WHERE ID  = $id;";
        $db->exec($sql);
        echo "<h1>Carta modificada correctamente</h1>";
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }

    $conDb = null;
}
function seleccionarPuntuaciones($conDb){
    $vectorTotal = array();
    try
    {
        $sql = "SELECT NOMBRE, PUNTOS FROM PUNTUACIONES ORDER BY PUNTOS DESC";
        $stmt = $conDb->query($sql);
        while($fila = $stmt->fetch(PDO::FETCH_ASSOC))
        {
        $vectorTotal[]=$fila;
        }
    }
    catch (PDOException $ex)
    {
        echo ("Error al conectar".$ex->getMessage());
    }
    return $vectorTotal;
}
function insertarPuntuacion($conDb, $nombre, $puntos){
    try {
        $db = new PDO("mysql:host=localhost;dbname=time_line;charset=utf8mb4", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "    INSERT INTO  puntuaciones  ( ID ,  NOMBRE ,  PUNTOS ) VALUES (NULL, '$nombre', '$puntos');";
        $db->exec($sql);
        // echo "<h1>Puntuacion añadida </h1>";
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
    
    $conDb = null;
}