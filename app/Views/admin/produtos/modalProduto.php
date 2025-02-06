<div class="modal fade" id="modalCadastro" tabindex="-1" aria-labelledby="modalCadastroLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
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
                        <label for="descricao" class="form-label">Descrição do Produto</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="4"
                            style="resize: none; height: 150px;"><?= old('descricao') ?>
                        </textarea>
                        <?php if (isset(session('validation')['descricao'])): ?>
                            <div class="text-danger"><?= session('validation')['descricao'] ?></div>
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

                    <button type="submit" class="btn btn-success">Salvar Produto</button>
                </form>
            </div>
        </div>
    </div>
</div>