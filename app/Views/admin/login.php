<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin</title>
    <link rel="shortcut icon" href="/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body style="background-color: #f8f9fa; height: 100vh; display: flex; justify-content: center; align-items: center;">

    <div class="card shadow" style="width: 100%; max-width: 400px;">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Login de Admin</h3>

            <?php if (session()->getFlashdata('erro')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('erro') ?>
                </div>
            <?php endif; ?>

            <form action="<?= url_to('auth') ?>" method="post">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>">
                    <?php if (isset($validation) && isset($validation['email'])): ?>
                        <div class="text-danger">
                            <?= $validation['email'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha">
                    <?php if (isset($validation) && isset($validation['senha'])): ?>
                        <div class="text-danger">
                            <?= $validation['senha'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>