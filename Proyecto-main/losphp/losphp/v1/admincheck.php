<?php
require_once '../DbOperation.php';

function checkadmin() {
    // Verifica si se proporciona el correo electrónico
    if (isset($_POST['Correo'])) {
        $correo = $_POST['Correo'];

        // Crea una instancia de DbOperation
        $db = new DbOperation();

        // Intenta realizar la verificación llamando al método check
        $response = $db->check($correo);

        // Muestra la respuesta en formato JSON
        echo json_encode($response);
    } else {
        // Manejar el caso cuando no se proporciona el correo electrónico
        echo json_encode(['error' => 'Correo electrónico no proporcionado']);
    }
}

// Llama a la función para realizar la verificación y mostrar la respuesta
checkadmin();

?>
