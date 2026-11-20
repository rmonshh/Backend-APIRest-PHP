<?php
// 1. Cabeceras para responder en JSON y permitir peticiones externas (CORS)
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// 2. Simulación de base de datos en memoria
$productos = [
    ['id' => 1, 'nombre' => 'Arroz', 'precio' => 2.00],
    ['id' => 2, 'nombre' => 'Leche', 'precio' => 1.20],
];

// 3. Detectar el método de la petición (GET o POST)
$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo === 'GET') {
    // Devolver lista completa o buscar por ID (?id=1)
    if (isset($_GET['id'])) {
        $idBuscado = (int) $_GET['id'];
        $resultado = array_filter($productos, fn($p) => $p['id'] === $idBuscado);
        echo json_encode(array_values($resultado));
    } else {
        echo json_encode($productos);
    }
    exit;
}

if ($metodo === 'POST') {
    // Leer el JSON enviado desde el frontend
    $entrada = json_decode(file_get_contents('php://input'), true);

    if (!empty($entrada['nombre']) && isset($entrada['precio'])) {
        $nuevoProducto = [
            'id' => count($productos) + 1,
            'nombre' => htmlspecialchars($entrada['nombre'], ENT_QUOTES, 'UTF-8'),
            'precio' => (float) $entrada['precio'],
        ];
        
        // Aquí guardarías en base de datos o archivo JSON
        $productos[] = $nuevoProducto;

        http_response_code(201);
        echo json_encode(['mensaje' => 'Producto creado', 'data' => $nuevoProducto]);
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Faltan los campos nombre o precio']);
    }
    exit;
}

// 4. Respuesta si usan otro método no permitido
http_response_code(405);
echo json_encode(['error' => 'Método no permitido']);




