<?= $this->extend('loja/layouts/default') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1 class="mb-4">Login</h1>

            <?php if (session()->has('success')): ?>
                <div id="success-alert" class="alert alert-success"><?= session('success') ?></div>
            <?php endif; ?>


            <form action="<?= url_to('autenticar') ?>" method="post">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= old('email') ?>">
                    <?php if (isset(session('validation')['email'])): ?>
                        <div id="alert" class="text-danger">
                            <?= session('validation')['email'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="senha" id="senha" class="form-control">
                    <?php if (isset(session('validation')['senha'])): ?>
                        <div id="alert" class="text-danger">
                            <?= session('validation')['senha'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>

            <p class="mt-3 text-center">
                Não tem uma conta? <a href="<?= url_to('cadastro') ?>">Cadastre-se</a>
            </p>
        </div>
    </div>
</div>
<script>
    window.addEventListener('DOMContentLoaded', function () {
        var successAlert = document.getElementById('success-alert');
        if (successAlert) {
            setTimeout(function () {
                successAlert.style.display = 'none';
            }, 2000);
        }
    });

    window.addEventListener('DOMContentLoaded', function () {
        var alert = document.querySelectorAll('#alert');

        alert.forEach(function (alert) {
            setTimeout(function () {
                alert.style.display = "none";
            }, 2000)
        });
    });
</script>

<?= $this->endSection() ?>