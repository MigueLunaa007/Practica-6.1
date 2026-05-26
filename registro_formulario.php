<?php
$nombreArchivo = "asistentes.txt":
$mensaje = "";

// verificamos si el formulario ha sido enviado por metodo POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['nombre_asistente'])) {
    $nuevoNombre = trim($_POST['nombre_asistente']);

    try{
        //abrimos en modo "a" para añadir texto al final sin borrar lo anterior
        $RArchivo = fopen($nombreArchivo, "a");

        if (!$RArchivo){
            throw new Exception("No se pudo abrir el archivo para añadir registros.");

        }

        //escribimos el nombre ingresado por el usuario
        fwrite($RArchivo, $nuevoNombre . PHP_EOL);
        fclose($RArchivo);

        $mensaje = "¡Asistente '$nuevoNombre' registrado con éxito!";
        } 
        catch (Exception $e) 
        {
    
        $mensaje = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Desafío: Registro de Asistentes</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f4f4f9; }
        .container { background: white; padding: 20px; border-radius: 8px; max-width: 500px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); }
        input[type="text"] { width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; }
        button { background-color: #28a745; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #218838; }
        .alert { padding: 10px; margin-bottom: 15px; color: white; background-color: #17a2b8; border-radius: 4px; }
        pre { background: #eee; padding: 10px; border-radius: 4px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Registro de Asistentes al Taller</h2>
    
    <?php if (!empty($mensaje)): ?>
        <div class="alert"><?php echo $mensaje; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="nombre_asistente">Nombre completo del asistente:</label>
        <input type="text" id="nombre_asistente" name="nombre_asistente" required placeholder="Ej. Juan Pérez">
        <button type="submit">Registrar Asistente</button>
    </form>

    <hr>

    <h3>Lista actual en asistentes.txt:</h3>
    <pre><?php 
        if (file_exists($nombreArchivo)) {
            // lee y muestra el contenido actual del archivo de texto
            echo htmlspecialchars(file_get_contents($nombreArchivo));
        } else {
            echo "El archivo aún no contiene registros.";
        }
    ?></pre>
</div>

</body>
</html>