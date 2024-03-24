<?php
// Verificamos si se enviaron datos mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificamos que se hayan recibido los datos necesarios
    if (isset($_POST["silla"]) && isset($_POST["fecha"]) && isset($_POST["hora"])) {
        // Obtenemos los datos del formulario
        $silla = $_POST["silla"];
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];

        // Creamos una cadena con los datos formateados
        $registro = "silla: $silla - Fecha: $fecha - Hora: $hora\n";

        // Ruta del archivo donde se almacenarán los registros
        $archivo = "reservas.txt";

        // Abrimos el archivo en modo de escritura (si no existe, se creará)
        $manejador = fopen($archivo, "a");

        // Verificamos si se pudo abrir el archivo
        if ($manejador === false) {
            echo "Error: No se pudo abrir el archivo.";
        } else {
            // Escribimos los datos en el archivo
            if (fwrite($manejador, $registro) === false) {
                echo "Error: No se pudo escribir en el archivo.";
            } else {
                echo "¡La reserva se ha realizado correctamente!";
            }
            // Cerramos el archivo
            fclose($manejador);
        }
    } else {
        // Mostramos un mensaje de error si no se recibieron todos los datos necesarios
        echo "Error: Por favor, complete todos los campos del formulario.";
    }
} else {
    // Mostramos un mensaje de error si la solicitud no es POST
    echo "Error: Método de solicitud incorrecto.";
}
?>