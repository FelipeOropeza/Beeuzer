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

<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalCadastro">
    + Adicionar Produto
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
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td><?= $produto['id'] ?></td>
                    <td><?= esc($produto['nome']) ?></td>
                    <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                    <td><?= esc($produto['cor']) ?></td>
                    <td><?= esc($produto['tamanho']) ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm">Editar</button>
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="modalCadastro" tabindex="-1" aria-labelledby="modalCadastroLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCadastroLabel">Cadastrar Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form action="<?= url_to('adicionar_produto') ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome do Produto</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?= old('nome') ?>">
                        <?php if (isset(session('validation')['nome'])): ?>
                            <div class="text-danger"><?= session('validation')['nome'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Imagem do Produto</label>
                        <input type="file" class="form-control" name="image" id="image">
                        <?php if (isset(session('validation')['image'])): ?>
                            <div class="text-danger"><?= session('validation')['image'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="preco" class="form-label">Preço</label>
                        <input type="number" step="0.01" class="form-control" id="preco" name="preco"
                            value="<?= old('preco') ?>">
                        <?php if (isset(session('validation')['preco'])): ?>
                            <div class="text-danger"><?= session('validation')['preco'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="cor" class="form-label">Cor</label>
                        <select class="form-select" id="cor" name="cor_id">
                            <option value="">Selecione</option>
                            <?php foreach ($cores as $cor): ?>
                                <option value="<?= $cor['id'] ?>" <?= old('cor_id') == $cor['id'] ? 'selected' : '' ?>>
                                    <?= esc($cor['nome']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset(session('validation')['cor_id'])): ?>
                            <div class="text-danger"><?= session('validation')['cor_id'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="tamanho" class="form-label">Tamanho</label>
                        <select class="form-select" id="tamanho" name="tamanho_id">
                            <option value="">Selecione</option>
                            <?php foreach ($tamanhos as $tamanho): ?>
                                <option value="<?= $tamanho['id'] ?>" <?= old('tamanho_id') == $tamanho['id'] ? 'selected' : '' ?>><?= esc($tamanho['descricao']) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset(session('validation')['tamanho_id'])): ?>
                            <div class="text-danger"><?= session('validation')['tamanho_id'] ?></div>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-success">Salvar Produto</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>