<?= $this->extend('loja/layouts/defaultperfil') ?>

<?= $this->section('content') ?>
<h2>📦 Meus Pedidos</h2>

<?php foreach ($pedidos as $pedido): ?>
    <div class="pedido">
        <p><strong>Pedido ID:</strong> <?= $pedido['id'] ?></p>
        <p><strong>Total do Pedido:</strong> <?= $pedido['totalpedido'] ?></p>
        <p><strong>Cartão:</strong> <?= $pedido['cartao'] ? $pedido['cartao'] : 'Não informado' ?></p>
        <p><strong>Status do Pagamento:</strong> <?= $pedido['status_pagamento'] ?></p>
    </div>
<?php endforeach; ?>

<?= $this->endSection() ?>
