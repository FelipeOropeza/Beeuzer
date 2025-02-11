<?= $this->extend('loja/layouts/default') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row g-4">
        <div class="col-12 col-md-8">
            <h2 class="h3 mb-4">🛒 Meu Carrinho</h2>

            <?php if (!empty($itens)): ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="table-light">
                                <th>Produto</th>
                                <th>Tamanho</th>
                                <th>Cor</th>
                                <th>Quantidade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $totalGeral = 0; ?>
                            <?php foreach ($itens as $item): ?>
                                <tr>
                                    <td><?= esc($item['nome']) ?></td>
                                    <td><?= esc($item['tamanho']) ?></td>
                                    <td><?= esc($item['cor']) ?></td>
                                    <td><?= esc($item['quantidade']) ?></td>
                                </tr>
                                <?php $totalGeral += $item['total']; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="text-muted">Seu carrinho está vazio. 🛍️</p>
            <?php endif; ?>
        </div>

        <div class="col-12 col-md-4">
            <div class="card p-3">
                <h3 class="h4 mb-4">Resumo da Compra</h3>
                <ul class="list-unstyled">
                    <?php foreach ($itens as $item): ?>
                        <li class="d-flex justify-content-between border-bottom py-2">
                            <span><?= esc($item['nome']) ?> (x<?= esc($item['quantidade']) ?>)</span>
                            <span><strong>R$ <?= number_format($item['total'], 2, ',', '.') ?></strong></span>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <?php if (!empty($itens)): ?>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span><strong>Total Geral:</strong></span>
                        <span class="text-success">R$ <?= number_format($totalGeral, 2, ',', '.') ?></span>
                    </div>

                    <a href="<?= url_to('finalizar') ?>" class="btn btn-primary w-100 mt-4">
                        💳 Finalizar Compra
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->include('loja/modal/modalFinalizar') ?>


<?= $this->endSection() ?>