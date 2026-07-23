<?php
    declare(strict_types=1);

    // Reemplaza estos 4 valores con los de Clever Cloud:
    $host = 'bxxx...-mysql.services.clever-cloud.com'; // Copia aquí el "Host"
    $user = 'uxxx...';                                 // Copia aquí el "User"
    $password = 'pxxx...';                             // Copia aquí el "Password"
    $database = 'bxxx...';                             // Copia aquí el "Database Name"
    $charset = 'utf8mb4';

    $dns = "mysql:host=$host;dbname=$database;charset=$charset";

    $opciones = [
        //Obliga a PDO a lanzar excepciones en caso de error SQL
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
        $pdo= new PDO($dns, $user, $password, $opciones);
} catch (PDOException $e) {
        http_response_code(500);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'estado' => 'error',
            'mensaje' => 'Fallo la conexion: ' . $e->getMessage()
        ]);
        exit;
    }
?>
