<?php
// Configurar las cabeceras para permitir solicitudes desde cualquier origen (CORS)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Obtener los datos enviados en el cuerpo de la solicitud
$inputJSON = file_get_contents("php://input");
$inputData = json_decode($inputJSON, true);

// Verificar si los datos existen y son válidos
if ($inputData) {
    
    // Responder con un JSON de éxito
    echo json_encode([
        "status" => "success",
        "message" => "Datos recibidos correctamente",
        "received_data" => $inputData
    ]);
} else {
    // Responder con un JSON de error
    echo json_encode([
        "status" => "error",
        "message" => "Datos inválidos o incompletos",
        "body" => isset($inputData) ? $inputData : "No disponible"
    ]);
}
?>
