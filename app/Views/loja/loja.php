<?= $this->extend('loja/layouts/default') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="row">
        <?php foreach ($produtos as $produto): ?>
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <img src="<?= esc($produto['imagem']) ?>" alt="<?= esc($produto['nome']) ?>" class="img-fluid">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= esc($produto['nome']) ?></h5>
                        <p class="card-text text-success fw-bold">R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                        </p>
                        <a href="<?= route_to('detalhes', $produto['id']) ?>"
                            class="btn btn-success btn-sm">Comprar</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>
