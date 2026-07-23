<?php
declare(strict_types=1);
session_start();

if (!isset($_SESSION['usuario_activo'])) {
    header('Location: index.php');
    exit();
}
$usuario = $_SESSION['usuario_activo'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Sistema POS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="frontend/css/dashboard.css">
    <style>
        .btn-verde {
            background-color: var(--verde-oscuro);
            color: white;
        }
        .btn-verde:hover {
            background-color: var(--verde-medio);
            color: white;
        }
        .tarjeta-bienvenida {
            border-top: 4px solid var(--verde-oscuro);
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <?php include __DIR__ . '/backend/includes/sidebar.php'; ?>
        <div id="content" class="w-100" style="margin-left: 280px;">
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm p-3 mb-4">
                <div class="container-fluid d-flex justify-content-between align-items-center">
                    <span class="navbar-brand mb-0 h4 text-secondary">&gt;INICIO</span>
                    <div>
                        <span class="me-4 fw-bold" style="color: var(--verde-oscuro);">
                            👤<?php echo strtoupper($usuario['nombre'] . ' | Rol:' . ucfirst($usuario['rol'])); ?>
                        </span>
                        <a href="backend/logout.php" class="btn btn-sm btn-outline-danger fw-bold">Cerrar sesión</a>
                    </div>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="card-shadow-sm tarjeta-bienvenida">
                    <div class="card-body text-center py-5">
                        <h2 class="fw-bold" style="color: var(--verde-oscuro);">
                            Bienvenido, <?php echo htmlspecialchars($usuario['nombre']); ?>!
                        </h2>
                        <p class="text-muted mb-0">Seleccione una opción del menú para comenzar.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
