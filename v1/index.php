<?php
    // Incluye el archivo DbOperation.php
    require_once '../DbOperation.php';

    // Array de respuesta
    $response = array();

    // Verifica si los campos necesarios están vacíos
    if (empty($_POST['Nombres']) || empty($_POST['Password']) || empty($_POST['Correo']) || !isset($_POST['Notificacion'])) {
        $response['error'] = true;
        $response['message'] = 'Campos Vacíos al enviar los datos';
    } else {
        // Recupera los datos del POST
        $nombres = $_POST['Nombres'];
        $password = $_POST['Password'];
        $correo = $_POST['Correo'];
        $notificacion = $_POST['Notificacion'];

        // Crea una instancia de DbOperation
        $db = new DbOperation();

        // Intenta insertar el usuario
        if ($db->insertUser($nombres, $password, $correo, $notificacion)) {
            $response['error'] = false;
            $response['message'] = 'Usuario agregado exitosamente';
        } else {
            $response['error'] = true;
            $response['message'] = 'No se pudo agregar el usuario';
        }
    }

    // Muestra la respuesta en formato JSON
    echo json_encode($response);
?>

