<?= $this->extend('loja/layouts/default') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1 class="mb-4">Cadastro</h1>

            <form action="<?= url_to('registrar') ?>" method="post">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control" value="<?= old('nome') ?>">
                    <?php if (isset(session('validation')['nome'])): ?>
                        <div class="text-danger">
                            <?= session('validation')['nome'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= old('email') ?>">
                    <?php if (isset(session('validation')['email'])): ?>
                        <div class="text-danger">
                            <?= session('validation')['email'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="senha" id="senha" class="form-control">
                    <?php if (isset(session('validation')['senha'])): ?>
                        <div class="text-danger">
                            <?= session('validation')['senha'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="password_confirm" class="form-label">Confirme a Senha</label>
                    <input type="password" name="confirma_senha" id="confirma_senha" class="form-control">
                    <?php if (session('validation.confirma_senha')): ?>
                        <div class="text-danger"><?= session('validation.confirma_senha') ?></div>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
            </form>

            <p class="mt-3 text-center">
                Já tem uma conta? <a href="<?= url_to('login') ?>">Faça login</a>
            </p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>