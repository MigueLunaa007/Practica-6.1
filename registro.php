<?php

// arreglo de nombres de asistentes
// este script crea un archivo de texto y escribe los nombres de los astentes en el

$nombres = [
    "Maria Lopez", 
    "Juan Perez", 
    "Carlos Garcia", 
    "Ana Torres",
    "Luis Sanchez"
];

//nombre del archivo donde se guardaran los nombres
$nombreArchivo = "asistentes.txt";

try {
    //tratamos de abrir el archivo para escritura
    //si el archivo no existe, se creara automaticamente
    $RArchivo = fopen($nombreArchivo, "w");

    //si no se pudo abrir el archivo, lanzamos una excepcion
    if (!$RArchivo) {
        throw new Exception("No se pudo abrir el archivo.");
    }

    //escribir nombres en el archivo
    foreach ($nombres as $nombre){
        fwrite($RArchivo, $nombre . PHP_EOL); // PHP_EOL inserta un salto de linea compatible con el sistema operativo
    }

    fclose($RArchivo);
    echo "Archivo creado y nombres escritos correctamente.";
} //try

catch (Exception $e){
    echo "Ocurrio un error: "  . $e->getMessage();
} //catch