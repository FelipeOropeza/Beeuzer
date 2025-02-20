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
                        <input type="text" class="form-control" id="nome_titular" name="nome_titular" required>
                    </div>
                    <div class="mb-3">
                        <label for="numero_cartao" class="form-label">Número do Cartão</label>
                        <input type="text" class="form-control" id="numero_cartao" name="numero_cartao" required>
                    </div>
                    <div class="mb-3">
                        <label for="validade" class="form-label">Validade</label>
                        <input type="month" class="form-control" id="validade" name="validade" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_cartao" class="form-label">Tipo do Cartão</label>
                        <select class="form-select" id="tipo_cartao" name="tipo_cartao" required>
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