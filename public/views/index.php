<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon API - Clean Architecture</title>
    <link rel="stylesheet" href="/pokemon-api-php-clean-architecture/public/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/pokemon-api-php-clean-architecture/public/assets/css/all.css" />
    <link rel="stylesheet" href="/pokemon-api-php-clean-architecture/public/assets/css/all.min.css" />
    <script src="/pokemon-api-php-clean-architecture/public/assets/js/jquery-3.6.0.min.js"></script>
    <script src="/pokemon-api-php-clean-architecture/public/assets/js/bootstrap.min.js"></script>
    <script src="/pokemon-api-php-clean-architecture/public/assets/js/sweetalert2@11.js"></script>
</head>

<body class="bg-dark">
    <div class="container bg-white py-4">
        <h1>Pokemon API PHP Clean Architecture</h1>
        <hr>
        <div class="content">
            <div class="row" id="divContent"></div>
        </div>
    </div>

    <!-- MODAL CORREO -->
    <?php require __DIR__ . '/partials/mail-modal.php'; ?>

    <!-- MODAL ELIMINAR -->
    <?php require __DIR__ . '/partials/delete-modal.php'; ?>

    <!-- MODAL GUARDAR -->
    <?php require __DIR__ . '/partials/save-modal.php'; ?>

    <script src="/pokemon-api-php-clean-architecture/public/assets/js/api/pokemonApi.js"></script>
    <script src="/pokemon-api-php-clean-architecture/public/assets/js/ui/renderer.js"></script>
    <script src="/pokemon-api-php-clean-architecture/public/assets/js/ui/alerts.js"></script>
    <script src="/pokemon-api-php-clean-architecture/public/assets/js/events/pokemonEvents.js"></script>
    <script src="/pokemon-api-php-clean-architecture/public/assets/js/app.js"></script>
</body>
</html>