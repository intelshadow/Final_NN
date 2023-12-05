<?php
    // Incluye el archivo DbOperation.php
    require_once '../DbOperation.php';

    // Valor por defecto para la respuesta
    $response = false;

    // Verifica si los campos necesarios están vacíos
    if (empty($_POST['Password']) || empty($_POST['Correo'])) {
        // Campos vacíos, la respuesta permanece como false
    } else {
        // Recupera los datos del usuario;
        $password = $_POST['Password'];
        $correo = $_POST['Correo'];

        // Crea una instancia de DbOperation
        $db = new DbOperation();

        // Intenta realizar la autenticación del usuario
        $response = $db->login($correo, $password);
    }

    // Muestra la respuesta en formato JSON
    echo json_encode($response);
?>

