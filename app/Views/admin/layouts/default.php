<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Admin Dashboard') ?></title>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

    <?= $this->include('admin/layouts/navbar') ?>

    <div class="container-fluid">
        <div class="row">
            <?= $this->include('admin/layouts/sidebar') ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 flex-grow-1">
                <?= $this->renderSection('content') ?>
            </main>
        </div>
    </div>

    <?= $this->include('admin/layouts/footer') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
