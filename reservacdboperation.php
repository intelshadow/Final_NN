<?php

require_once dirname(__FILE__) . '/DbConnect.php';

class DbOperation
{
    private $con;

    function __construct()
    {
        $db = new DbConnect();
        $this->con = $db->connect();
    }

    // Añadir un registro a la base de datos
    public function insertUser($nombres, $password, $correo, $notification)
    {
        $stmt = $this->con->prepare("INSERT INTO usuarios(nombreUsuario, contraseña, Correo, Notificaciones) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $nombres, $password, $correo, $notification);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Obtener todos los registros de la base de datos
    public function getUser($username, $password)
    {
        $stmt = $this->con->prepare("SELECT Id, nombreUsuario, contrasena, Correo, Notificaciones FROM usuarios WHERE nombreUsuario = ? AND contrasena = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->bind_result($Id, $nombreUsuario, $contrasena, $Correo, $Notificacion);
        $usuarios = array();

        while ($stmt->fetch()) {
            $temp = array();
            $temp['Id'] = $Id;
            $temp['nombreUsuario'] = $nombreUsuario;
            $temp['contraseña'] = $contrasena;
            $temp['Correo'] = $Correo;
            $temp['Notificaciones'] = $Notificacion;

            array_push($usuarios, $temp);
        }
        return $usuarios;
    }

    public function login($correo, $password)
    {
        // Prepara la consulta SQL para seleccionar un usuario por su correo
        $stmt = $this->con->prepare("SELECT*FROM usuarios WHERE Correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->bind_result($Id, $nombreUsuario, $contrasena, $Correo, $Notificacion, $admin);

        if ($stmt->fetch()) {
            // Usuario encontrado, verificar la contraseña
            if ($contrasena == $password) {
                // Contraseña correcta, autenticación exitosa

                // Registro de log de éxito
                error_log("Login exitoso para el usuario con correo: $correo");

                $stmt->close(); // Cerrar la declaración después de usarla

                return true;
            } else {
                // Contraseña incorrecta

                // Registro de log de error
                error_log("Intento de login fallido para el usuario con correo: $correo. Contraseña incorrecta.");

                $stmt->close(); // Cerrar la declaración después de usarla

                return false;
            }
        } else {
            // Usuario no encontrado

            // Registro de log de error
            error_log("Intento de login fallido. Usuario con correo $correo no encontrado.");

            $stmt->close(); // Cerrar la declaración después de usarla

            return false;
        }
    }

    public function check($correo)
    {
        // Prepara la consulta SQL para seleccionar un usuario por su correo
        $stmt = $this->con->prepare("SELECT admin FROM usuarios WHERE Correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->bind_result($admin);

        if ($stmt->fetch()) {
            // Usuario encontrado, verificar si es administrador
            if ($admin == 1) {
                // Registro de log de éxito
                error_log("El usuario es admin: $correo");

                $stmt->close(); // Cerrar la declaración después de usarla

                return true;
            } else {
                // No es administrador

                // Registro de log de error
                error_log("El usuario no es admin: $correo. No es administrador.");

                $stmt->close(); // Cerrar la declaración después de usarla

                return false;
            }
        } else {
            // Usuario no encontrado

            // Registro de log de error
            error_log("Intento de login fallido. Usuario con correo $correo no encontrado.");

            $stmt->close(); // Cerrar la declaración después de usarla

            return false;
        }
    }

public function addQuestion($enunciado, $respuesta1, $respuesta2, $respuesta3, $respuesta4, $r1, $r2, $r3, $r4, $dificultad, $lenguaje, $tema, $correccion)
{
    try {
        // Insertar enunciado y obtener su ID
        $stmt = $this->con->prepare("INSERT INTO enunciados (texto_enunciado, lenguaje, dificultad, tema, correccion) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiss", $enunciado, $lenguaje, $dificultad, $tema, $correccion);
        $stmt->execute();
        $enunciadoId = $this->con->insert_id;

        // Insertar preguntas asociadas al enunciado
        $stmt = $this->con->prepare("INSERT INTO respuestas (enunciado_id, texto_pregunta, grado_dificultad, correcta, creado_fecha) VALUES (?, ?, ?, ?, current_timestamp())");

        // Respuesta 1
        $correcta1 = $r1 == "true" ? 1 : 0;
        $stmt->bind_param("issi", $enunciadoId, $respuesta1, $dificultad, $correcta1);
        $stmt->execute();

        // Respuesta 2
        $correcta2 = $r2 == "true" ? 1 : 0;
        $stmt->bind_param("issi", $enunciadoId, $respuesta2, $dificultad, $correcta2);
        $stmt->execute();

        // Respuesta 3
        $correcta3 = $r3 == "true" ? 1 : 0;
        $stmt->bind_param("issi", $enunciadoId, $respuesta3, $dificultad, $correcta3);
        $stmt->execute();

        // Respuesta 4
        $correcta4 = $r4 == "true" ? 1 : 0;
        $stmt->bind_param("issi", $enunciadoId, $respuesta4, $dificultad, $correcta4);
        $stmt->execute();

        return true;
    } catch (Exception $e) {
        // Manejar errores de base de datos
        // Puedes registrar el error o lanzar una excepción según tus necesidades
        error_log("Error de base de datos: " . $e->getMessage());
        return false;
    }
}



public function addQuestion_completar($enunciado, $respuesta1, $dificultad, $lenguaje, $tema, $correccion)
    {
        try {
            // Insertar enunciado y obtener su ID
            $stmt = $this->con->prepare("INSERT INTO enunciados_completar (texto_enunciado_completar, lenguaje_completar, dificultad_completar, tema_completar, correccion) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssiss", $enunciado, $lenguaje, $dificultad, $tema, $correccion);
            $stmt->execute();
            $enunciadoId = $this->con->insert_id;

            $correcta = 1;
            // Insertar pregunta asociada al enunciado
            $stmt = $this->con->prepare("INSERT INTO respuestas_completar (enunciado_id,texto_pregunta,grado_dificultad, correcta,creado_fecha) VALUES (?, ?, ?, ?,current_timestamp())");
            $stmt->bind_param("isii", $enunciadoId, $respuesta1, $dificultad, $correcta);
            $stmt->execute();

            return true;
        } catch (Exception $e) {
            // Manejar errores de base de datos
            // Puedes registrar el error o lanzar una excepción según tus necesidades
            error_log("Error de base de datos: " . $e->getMessage());
            return false;
        }
}

    public function addQuestion_escribir($enunciado, $respuesta1, $dificultad, $lenguaje, $tema, $correccion)
    {
        try {
            // Insertar enunciado y obtener su ID
            $stmt = $this->con->prepare("INSERT INTO enunciados_escribir (texto_enunciado_escribir, lenguaje_escribir, dificultad_escribir, tema_escribir, correccion) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssiss", $enunciado, $lenguaje, $dificultad, $tema, $correccion);
            $stmt->execute();
            $enunciadoId = $this->con->insert_id;


            $correcta = 1;
            // Insertar pregunta asociada al enunciado
            $stmt = $this->con->prepare("INSERT INTO respuestas_escribir (enunciado_id,texto_pregunta,grado_dificultad, correcta,creado_fecha) VALUES (?, ?, ?, ?,current_timestamp())");
            $stmt->bind_param("isii", $enunciadoId, $respuesta1, $dificultad, $correcta);
            $stmt->execute();

            return true;
        } catch (Exception $e) {
            // Manejar errores de base de datos
            // Puedes registrar el error o lanzar una excepción según tus necesidades
            error_log("Error de base de datos: " . $e->getMessage());
            return false;
        }
    }
public function plantillatest($lenguaje, $tema) {
    $response = array();

    try {
        // Realiza la consulta SQL con marcadores de posición
        $sql = "SELECT e.*, r.*
                FROM enunciados e
                LEFT JOIN respuestas r ON e.id_enunciado = r.enunciado_id
                WHERE e.lenguaje = ? AND e.tema = ?
                ORDER BY RAND()
                LIMIT 1;";

        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ss", $lenguaje, $tema);
        $stmt->execute();

        $result = $stmt->get_result();

        // Obtén el resultado de la consulta
        $resultado = $result->fetch_assoc();

        if ($resultado) {
            // Obtén todas las respuestas para el enunciado seleccionado
            $respuestas = $this->getRespuestas($resultado['id_enunciado']);

            $response['error'] = false;
            $response['data'] = array(
                'enunciado' => $resultado,
                'respuestas' => $respuestas
            );
        } else {
            $response['error'] = true;
            $response['message'] = 'No se encontraron enunciados para el tema y lenguaje especificados.';
        }
    } catch (mysqli_sql_exception $e) {
        $response['error'] = true;
        $response['message'] = 'Error al realizar la consulta: ' . $e->getMessage();
    }

    return $response;
}

// Función para obtener todas las respuestas para un enunciado dado
private function getRespuestas($idEnunciado) {
    $sql = "SELECT * FROM respuestas WHERE enunciado_id = ?";
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("i", $idEnunciado);
    $stmt->execute();

    $result = $stmt->get_result();
    $respuestas = array();

    while ($row = $result->fetch_assoc()) {
        $respuestas[] = $row;
    }

    return $respuestas;
}
public function plantillacompletar($lenguaje, $tema) {
    $response = array();

    try {
        // Realiza la consulta SQL con marcadores de posición
        $sql = "SELECT ec.*, rc.*
        FROM enunciados_completar ec
        LEFT JOIN respuestas_completar rc ON ec.id_enunciado_completar = rc.enunciado_id
        WHERE ec.lenguaje_completar = ? AND ec.tema_completar = ?
        ORDER BY RAND()
        LIMIT 1;
        ";

        $stmt = $this->con->prepare($sql);

        // Asegúrate de que estás vinculando el número correcto de parámetros
        $stmt->bind_param("ss", $lenguaje, $tema);

        $stmt->execute();

        $result = $stmt->get_result();

        // Obtén el resultado de la consulta
        $resultado = $result->fetch_assoc();

        if ($resultado) {
            $response['error'] = false;
            $response['data'] = $resultado; // Ahora incluye todos los datos de la fila
        } else {
            $response['error'] = true;
            $response['message'] = 'No se encontraron enunciados para el tema y lenguaje especificados.';
        }
    } catch (mysqli_sql_exception $e) {
        $response['error'] = true;
        $response['message'] = 'Error al realizar la consulta: ' . $e->getMessage();
    }

    return $response;
}


public function plantillaescribir($lenguaje, $tema) {
    $response = array();

    try {
        // Realiza la consulta SQL con marcadores de posición
        $sql = "SELECT ee.*, rc.*
        FROM enunciados_escribir ee
        LEFT JOIN respuestas_completar rc ON ee.id_enunciado_escribir = rc.enunciado_id
        WHERE ee.lenguaje_escribir = ? AND ee.tema_escribir = ?
        ORDER BY RAND()
        LIMIT 1;";

        $stmt = $this->con->prepare($sql);

        // Asegúrate de que estás vinculando el número correcto de parámetros
        $stmt->bind_param("ss", $lenguaje, $tema);

        $stmt->execute();

        $result = $stmt->get_result();

        // Obtén el resultado de la consulta
        $resultado = $result->fetch_assoc();

        if ($resultado) {
            $response['error'] = false;
            $response['data'] = $resultado; // Ahora incluye todos los datos de la fila
        } else {
            $response['error'] = true;
            $response['message'] = 'No se encontraron enunciados para el tema y lenguaje especificados.';
        }
    } catch (mysqli_sql_exception $e) {
        $response['error'] = true;
        $response['message'] = 'Error al realizar la consulta: ' . $e->getMessage();
    }

    return $response;
}


}

?>

