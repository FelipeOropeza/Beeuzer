<?= $this->extend('loja/layouts/defaultperfil') ?>

<?= $this->section('content') ?>
<h2>Cartões</h2>

<button type="button" onclick="abrirModal()" class="btn btn-primary">Adicionar Cartão</button>

<table class="table">
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
                        <form action="<?= base_url('cartoes/excluir/' . $cartao['id']) ?>" method="post" style="display:inline;">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este cartão?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Nenhum cartão cadastrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->include('loja/modal/modalCartao') ?>

<?= $this->endSection() ?>
