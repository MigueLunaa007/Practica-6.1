<?php

// nombre del archivo que contiene los asistentes
// este script lee un archivo de texto y muestra los nombres de los asistentes en una lista numerada

$archivo = "asistentes.txt";

try{
    // verifica si el archivo existe
    if (!file_exists($archivo)){
        throw new Exception("El archivo no existe.");
    }

    // abrir el archivo para lectura
    $fp = fopen($archivo, "r");

    // si no se pudo abrir el archivo, lanzamos una excepcion
    if (!$fp){
        throw new Exception("No se pudo abrir el archivo para lectura.");
    }

    // leer el archivo linea por linea y mostrar los nombres
    $contador = 1;
    while (!feof($fp)){
        // leemos una linea del archivo
        $linea = fgets($fp);

        // htmlspecialchars() para evitar problemas de seguridad con HTML
        echo $contador . ". " . htmlspecialchars(trim($linea)) . "<br>";
        $contador++;
    }

    fclose($fp);
}

catch (Exception $e){
    echo "Error: " . $e->getMessage();
}
?>