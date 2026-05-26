<?php

// nombre del archivo que contiene los asistentes
// este script lee un archivo de texto y muestra los nombres de los asistentes en una lista numerada

$archivo = "asistentes.txt";

try{
    // verifica si el archivo existe
    if (!file_exists($archivo)){
        throw new Exception("El archivo no existe. Por favor, registra asistentes primero.");
    }

    // abrir el archivo para lectura
    $fp = fopen($archivo, "r");

    // si no se pudo abrir el archivo, lanzamos una excepcion
    if (!$fp){
        throw new Exception("No se pudo abrir el archivo para lectura.");
    }

    echo "<h2>Lista Oficial de Asistentes</h2>";
    // aqui se inicia la etiqueta de lista ordenada HTML
    echo "<ol>";

    // leer el archivo linea por linea y mostrar los nombres
    $contador = 1;
    while (!feof($fp)){
        // leemos una linea del archivo
        $linea = fgets($fp);
        
        // evitamos imprimir "<li></li>" vacios al final del archivo
        if (trim($linea) !== '') {
            // imprimimos cada nombre dentro de una etiqueta de elemento de lista <li>
            echo "<li>" . htmlspecialchars(trim($linea)) . "</li>";
        }

        /* // verificamos que la linea no este vacia antes de imprimir
        if (trim($linea) !==''){
            // htmlspecialchars() para evitar problemas de seguridad con HTML
             echo $contador . ". " . htmlspecialchars(trim($linea)) . "<br>";
            $contador++; 
        }*/

    }

    // cerramos la etiqueta de lista ordenada
    echo "</ol>";

    fclose($fp);
}

catch (Exception $e){
    echo "<strong>Error:</strong> " . $e->getMessage();
}
?>