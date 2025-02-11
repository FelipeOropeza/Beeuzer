<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Meu Perfil - Beeuzer') ?></title>
    <link rel="shortcut icon" href="/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
    <?= $this->include('loja/layouts/navbar') ?>

    <div class="container mt-4 flex-grow-1">
        <div class="row">

            <?= $this->include('loja/layouts/sideBar') ?>

            <section class="col-md-9">
                <div class="bg-white p-4 border rounded">
                    <?= $this->renderSection('content') ?>
                </div>
            </section>
        </div>
    </div>

    <?= $this->include('loja/layouts/footer') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>