<div class="modal fade" id="modalCartao" tabindex="-1" aria-labelledby="modalCartaoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCartaoLabel">Cadastrar Cartão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form action="<?= url_to('cadastrar_cartao') ?>" method="POST">
                    <div class="mb-3">
                        <label for="nome_titular" class="form-label">Nome do Titular</label>
                        <input type="text" class="form-control" id="nome_titular" name="nome_titular" value="<?= old('nome_titular') ?>">
                        <?php if (isset(session('validation')['nome_titular'])): ?>
                            <div class="text-danger small">
                                <?= session('validation')['nome_titular'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="numero_cartao" class="form-label">Número do Cartão</label>
                        <input type="text" class="form-control" id="numero_cartao" name="numero_cartao" value="<?= old('numero_cartao') ?>">
                        <?php if (isset(session('validation')['numero_cartao'])): ?>
                            <div class="text-danger small">
                                <?= session('validation')['numero_cartao'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-md-6">
                            <label for="validade" class="form-label">Validade</label>
                            <input type="month" class="form-control" id="validade" name="validade" value="<?= old('validade') ?>">
                            <?php if (isset(session('validation')['validade'])): ?>
                            <div class="text-danger small">
                                <?= session('validation')['validade'] ?>
                            </div>
                        <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <label for="cvv" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="cvv" name="cvv" value="<?= old('cvv') ?>">
                            <?php if (isset(session('validation')['cvv'])): ?>
                            <div class="text-danger small">
                                <?= session('validation')['cvv'] ?>
                            </div>
                        <?php endif; ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_cartao" class="form-label">Tipo do Cartão</label>
                        <select class="form-select" id="tipo_cartao" name="tipo_cartao" >
                            <option value="Crédito">Crédito</option>
                            <option value="Débito">Débito</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>