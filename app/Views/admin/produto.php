<?= $this->extend('admin/layouts/default') ?>

<?= $this->section('content') ?>
<h1 class="mt-4">Produtos</h1>
<p class="lead">Aqui você pode gerenciar os produtos cadastrados no sistema.</p>

<?php if (session('validation')): ?>
    <script>
        $(document).ready(function () {
            $('#modalCadastro').modal('show');
        });
    </script>
<?php endif; ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalCadastro">
    + Adicionar Produto
</button>

<button type="button" class="btn btn-secondary mb-3" data-bs-toggle="modal" data-bs-target="#modalVariacao">
    + Adicionar Variação de Produto
</button>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Cor</th>
                <th>Tamanho</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtosVariacoes as $produto): ?>
                <tr>
                    <td><?= $produto['id'] ?></td>
                    <td><?= esc($produto['nome']) ?></td>
                    <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                    <td><?= esc($produto['cor']) ?></td>
                    <td><?= esc($produto['tamanho']) ?></td>
                    <td><?= esc($produto['status']) ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm">Editar</button>
                        <form action="<?= route_to('desativar_produto', $produto['produto_id']) ?>" method="post"
                            style="display: inline;">
                            <button type="submit"
                                class="btn <?= $produto['status'] === 'Ativo' ? 'btn-danger' : 'btn-success' ?> btn-sm">
                                <?= $produto['status'] === 'Ativo' ? 'Desativar' : 'Ativar' ?>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php if (isset($pager)): ?>
    <div class="d-flex justify-content-center">
        <?= $pager->links('default', 'foundation_full') ?>
    </div>
<?php endif; ?>

<?= $this->include('admin/modal/modalProduto') ?>
<?= $this->include('admin/modal/modalProdutoVariacoes') ?>

<?= $this->endSection() ?>