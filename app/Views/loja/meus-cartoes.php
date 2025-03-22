<?= $this->extend('loja/layouts/defaultperfil') ?>

<?= $this->section('content') ?>

<?php if (session('validation')): ?>
    <script>
        window.onload = function () {
            var modal = new bootstrap.Modal(document.getElementById('modalCartao'));
            modal.show();
        }
    </script>
<?php endif; ?>

<h2 class="mb-4">Cartões</h2>

<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalCartao">
    Adicionar Cartão
</button>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nome do Titular</th>
            <th>Número</th>
            <th>Validade</th>
            <th>Tipo</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($cartoes)): ?>
            <?php foreach ($cartoes as $cartao): ?>
                <tr>
                    <td><?= esc($cartao['nome_titular']) ?></td>
                    <td>**** **** **** <?= substr($cartao['numero_cartao'], -4) ?></td>
                    <td><?= esc($cartao['validade']) ?></td>
                    <td><?= esc($cartao['tipo_cartao']) ?></td>
                    <td><?= esc($cartao['status']) ?></td>
                    <td>
                        <form action="<?= route_to('excluir_cartao', $cartao['id']) ?>" method="post" class="d-inline">
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Tem certeza que deseja excluir este cartão?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">Nenhum cartão cadastrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->include('loja/modal/modalCartao') ?>

<?= $this->endSection() ?>