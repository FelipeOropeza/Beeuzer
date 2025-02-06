<?= $this->extend('loja/layouts/default') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= esc($produto['imagem']) ?>" alt="<?= esc($produto['nome']) ?>" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h1><?= esc($produto['nome']) ?></h1>
            <?php if (session()->has('erro')): ?>
                <div id="success-alert" class="alert alert-danger">
                    <?= session('erro') ?>
                </div>
            <?php endif; ?>
            <p class="text-muted"><?= esc($produto['descricao']) ?></p>
            <p class="text-success fw-bold">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>

            <form action="<?= url_to('adicionar') ?>" method="post">
                <input type="hidden" name="produto_id" value="<?= $produto['id'] ?>">
                <div class="mb-3">
                    <label for="tamanho_id" class="form-label">Tamanho</label>
                    <select class="form-select" id="tamanho_id" name="tamanho_id" required>
                        <?php foreach ($tamanhos as $tamanho): ?>
                            <option value="<?= $tamanho['id'] ?>"><?= esc($tamanho['descricao']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="cor_id" class="form-label">Cor</label>
                    <select class="form-select" id="cor_id" name="cor_id" required>
                        <?php foreach ($cores as $cor): ?>
                            <option value="<?= $cor['id'] ?>"><?= esc($cor['nome']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="quantidade" class="form-label">Quantidade</label>
                    <input type="number" class="form-control" id="quantidade" name="quantidade" value="1" min="1"
                        required>
                </div>

                <button class="btn btn-success" type="submit">Adicionar ao Carrinho</button>
            </form>
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
</script>
<?= $this->endSection() ?>