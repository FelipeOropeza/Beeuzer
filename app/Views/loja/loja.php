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
                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('produto/detalhes/' . $produto['id']) ?>"
                                class="btn btn-primary btn-sm">Detalhes</a>
                            <a href="<?= base_url('carrinho/adicionar/' . $produto['id']) ?>"
                                class="btn btn-success btn-sm">Adicionar ao Carrinho</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>