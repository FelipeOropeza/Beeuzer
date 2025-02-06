<div class="modal fade" id="modalVariacao" tabindex="-1" aria-labelledby="modalVariacaoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalVariacaoLabel">Adicionar Variação de Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form action="<?= url_to('adicionar_variacao') ?>" method="post">
                    <div class="mb-3">
                        <label for="produto_id" class="form-label">Produto</label>
                        <select class="form-select" id="produto_id" name="produto_id" required>
                            <option value="">Selecione um produto</option>
                            <?php foreach ($produtos as $produto): ?>
                                <option value="<?= $produto['id'] ?>"><?= esc($produto['nome']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="cor_id" class="form-label">Cor</label>
                        <select class="form-select" id="cor_id" name="cor_id" required>
                            <option value="">Selecione uma cor</option>
                            <?php foreach ($cores as $cor): ?>
                                <option value="<?= $cor['id'] ?>"><?= esc($cor['nome']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tamanho_id" class="form-label">Tamanho</label>
                        <select class="form-select" id="tamanho_id" name="tamanho_id" required>
                            <option value="">Selecione um tamanho</option>
                            <?php foreach ($tamanhos as $tamanho): ?>
                                <option value="<?= $tamanho['id'] ?>"><?= esc($tamanho['descricao']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Salvar Variação</button>
                </form>
            </div>
        </div>
    </div>
</div>
