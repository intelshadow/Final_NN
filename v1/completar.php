<?php
// Incluye el archivo DbOperation.php
require_once '../DbOperation.php';

// Array de respuesta
$response = array();

// Verifica si los campos necesarios están vacíos
if (empty($_POST['enunciado']) || empty($_POST['respuesta1']) || empty($_POST['dificultad']) || empty($_POST['lenguaje']) || empty($_POST['tema']) || empty($_POST['correccion'])){
    $response['error'] = true;
    $response['message'] = 'Campos Vacíos al enviar los datos';
} else {
    // Recupera los datos del POST
    $enunciado = $_POST['enunciado'];
    $respuesta1 = $_POST['respuesta1'];
    $dificultad = $_POST['dificultad'];
    $lenguaje = $_POST['lenguaje'];
    $tema = $_POST['tema'];
    $correccion = $_POST['correccion'];

    // Crea una instancia de DbOperation
    $db = new DbOperation();

    // Intenta agregar la pregunta
    if ($db->addQuestion_completar($enunciado, $respuesta1, $dificultad, $lenguaje, $tema, $correccion)) {
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
