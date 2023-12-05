<?php
// Incluye el archivo DbOperation.php
require_once '../DbOperation.php';

// Array de respuesta
$response = array();

// Verifica si los campos necesarios están vacíos
if (empty($_POST['lenguaje']) || empty($_POST['tema'])) {
    $response['error'] = true;
    $response['message'] = 'Campos Vacios al enviar los datos';

    // Registro de error
    error_log('Campos Vacios al enviar los datos');
} else {
    // Recupera los datos del POST
    $lenguaje = $_POST['lenguaje'];
    $tema = $_POST['tema'];

    // Crea una instancia de DbOperation
    $db = new DbOperation();

    // Llama a la función plantillatest
    $resultadoConsulta = $db->plantillacompletar($lenguaje, $tema);

    // Actualiza el mensaje de respuesta según el resultado de la consulta
    if (!$resultadoConsulta['error']) {
        $response['error'] = false;
        $response['message'] = 'Operación exitosa';
        $response['data'] = $resultadoConsulta['data']; // Agrega los datos de la consulta al array de respuesta
    } else {
        $response['error'] = true;
        $response['message'] = 'Error en la operación';
    }
}

// Almacena la respuesta en un archivo JSON en la carpeta /var/www/html/v1
$jsonFileName = '/var/www/html/v1/response2.json';
file_put_contents($jsonFileName, json_encode($response));

// Muestra la respuesta en formato JSON
echo json_encode($response);
?>
