<?php
// Incluye el archivo DbOperation.php
require_once '../DbOperation.php';

// Array de respuesta
$response = array();

// Verifica si los campos necesarios están vacíos
if (empty($_POST['enunciado']) || empty($_POST['respuesta1']) || empty($_POST['respuesta2']) || empty($_POST['respuesta3']) || empty($_POST['respuesta4']) || empty($_POST['r1']) || empty($_POST['r2']) || empty($_POST['r3']) || empty($_POST['r4']) || empty($_POST['dificultad']) || empty($_POST['lenguaje']) || empty($_POST['tema']) || empty($_POST['correccion'])) {
    $response['error'] = true;
    $response['message'] = 'Campos Vacíos al enviar los datos';
} else {
    // Recupera los datos del POST
    $enunciado = $_POST['enunciado'];
    $respuesta1 = $_POST['respuesta1'];
    $respuesta2 = $_POST['respuesta2'];
    $respuesta3 = $_POST['respuesta3'];
    $respuesta4 = $_POST['respuesta4'];
    $r1 = $_POST['r1'];
    $r2 = $_POST['r2'];
    $r3 = $_POST['r3'];
    $r4 = $_POST['r4'];
    $dificultad = $_POST['dificultad'];
    $lenguaje = $_POST['lenguaje'];
    $tema = $_POST['tema'];
    $correccion = $_POST['correccion'];

    // Crea una instancia de DbOperation
    $db = new DbOperation();

    // Intenta agregar la pregunta
    if ($db->addQuestion($enunciado, $respuesta1, $respuesta2, $respuesta3, $respuesta4, $r1, $r2, $r3, $r4, $dificultad, $lenguaje, $tema, $correccion)) {
        $response['error'] = false;
        $response['message'] = 'Pregunta agregada exitosamente';
    } else {
        $response['error'] = true;
        $response['message'] = 'No se pudo agregar la pregunta';
    }
}

// Muestra la respuesta en formato JSON
echo json_encode($response);
?>


