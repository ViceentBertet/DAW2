<?php
include("gestionConexion.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

$inputJSON = file_get_contents("php://input");
$inputData = json_decode($inputJSON, true);

if ($inputData) {
    if (anyadirInclude($inputData['datos'], $inputData['precioTotal'], $inputData['email'])) {
        echo json_encode([
            "status" => "success",
            "message" => "Se ha confirmado su pedido"
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "No se ha podido confirmar su pedido."
        ]);
    }
} else {
    // Responder con un JSON de error
    echo json_encode([
        "status" => "error",
        "message" => "Datos inválidos o incompletos",
        "body" => isset($inputData) ? $inputData : "No disponible"
    ]);
}
?>
