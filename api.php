
<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

include_once "config.php";

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents("php://input"), true);

switch ($method) {
    case "GET":
        $sql = "SELECT * FROM usuarios";
        $result = $conn->query($sql);
        $usuarios = array();

        while ($row = $result->fetch_assoc()) {
            array_push($usuarios, $row);
        }

        echo json_encode($usuarios);
        break;

    case "POST":
        $nombre = $input['nombre'];
        $apellido = $input['apellido'];
        $edad = $input['edad'];
        $foto = $input['foto'];
        $tipo_documento = $input['tipo_documento'];
        $rol_id = $input['rol_id'];

        $sql = "INSERT INTO usuarios (nombre, apellido, edad, foto, tipo_documento, rol_id) VALUES ('$nombre', '$apellido', '$edad', '$foto', '$tipo_documento', '$rol_id')";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(array("message" => "Usuario creado"));
        } else {
            echo json_encode(array("message" => "Error al crear usuario"));
        }
        break;

    case "PUT":
        $id = $input['id'];
        $nombre = $input['nombre'];
        $apellido = $input['apellido'];
        $edad = $input['edad'];
        $foto = $input['foto'];
        $tipo_documento = $input['tipo_documento'];
        $rol_id = $input['rol_id'];

        $sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', edad='$edad', foto='$foto', tipo_documento='$tipo_documento', rol_id='$rol_id' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(array("message" => "Usuario actualizado"));
        } else {
            echo json_encode(array("message" => "Error al actualizar usuario"));
        }
        break;

    case "DELETE":
        $id = $input['id'];
        $sql = "DELETE FROM usuarios WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(array("message" => "Usuario eliminado"));
        } else {
            echo json_encode(array("message" => "Error al eliminar usuario"));
        }
        break;
}
?>