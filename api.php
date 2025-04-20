<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

$servicios = [
    ["id" => 1, "nombre" => "Consultoría Digital", "descripcion" => "Asesoría en transformación digital"],
    ["id" => 2, "nombre" => "Soluciones Multiexperiencia", "descripcion" => "Interfaces centradas en el usuario"],
    ["id" => 3, "nombre" => "Evolución de Ecosistemas", "descripcion" => "Adaptación tecnológica escalable"],
    ["id" => 4, "nombre" => "Soluciones Low-Code", "descripcion" => "Automatización con bajo desarrollo"]
];

$method = $_SERVER['REQUEST_METHOD'];


$input = json_decode(file_get_contents("php://input"), true);

$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($method) {
    case 'GET':
        if ($id) {
            // Buscar servicio por ID
            foreach ($servicios as $servicio) {
                if ($servicio['id'] == $id) {
                    echo json_encode($servicio);
                    exit;
                }
            }
            http_response_code(404);
            echo json_encode(["mensaje" => "Servicio no encontrado"]);
        } else {
            echo json_encode($servicios);
        }
        break;

    case 'POST':
        if ($input && isset($input['nombre']) && isset($input['descripcion'])) {
            $nuevo = [
                "id" => count($servicios) + 1,
                "nombre" => $input['nombre'],
                "descripcion" => $input['descripcion']
            ];
            $servicios[] = $nuevo;
            echo json_encode(["mensaje" => "Servicio creado", "servicio" => $nuevo]);
        } else {
            http_response_code(400);
            echo json_encode(["mensaje" => "Datos incompletos"]);
        }
        break;

    case 'PUT':
        if ($id && $input) {
            echo json_encode(["mensaje" => "Servicio con ID $id actualizado", "datos" => $input]);
        } else {
            http_response_code(400);
            echo json_encode(["mensaje" => "ID o datos faltantes"]);
        }
        break;

    case 'DELETE':
        if ($id) {
            echo json_encode(["mensaje" => "Servicio con ID $id eliminado"]);
        } else {
            http_response_code(400);
            echo json_encode(["mensaje" => "ID faltante"]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["mensaje" => "Método no permitido"]);
        break;
}
?>

