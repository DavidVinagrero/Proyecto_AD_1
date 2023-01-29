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
        $sql = "INSERT INTO `mazos` (`ID`, `NOMBRE`, `DESCRIPCION`) VALUES (NULL, '$nombre', '$descripcion')";
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