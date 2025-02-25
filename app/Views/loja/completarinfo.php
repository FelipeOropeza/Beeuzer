<?= $this->extend('loja/layouts/default') ?>

<?= $this->section('content') ?>
<div class="container mt-5 mb-5">
    <h2>Informações de Pagamento</h2>
    <form action="#" method="POST">
        <div class="card mb-4">
            <div class="card-header">
                <h4 class="card-title">Detalhes do Cartão de Crédito</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="cartaoSelecionado" class="form-label">Selecionar Cartão Salvo</label>
                    <select id="cartaoSelecionado" class="form-control">
                        <option value="">Escolha um cartão</option>
                        <option value="1">Cartão **** 1234</option>
                        <option value="2">Cartão **** 5678</option>
                        <option value="3">Cartão **** 9012</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="numeroCartao" class="form-label">Número do Cartão</label>
                    <input type="text" class="form-control" id="numeroCartao" placeholder="0000 0000 0000 0000">
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="dataValidade" class="form-label">Data de Validade</label>
                            <input type="month" class="form-control" id="dataValidade">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="cvv" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="cvv" placeholder="123">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h4 class="card-title">Endereço de Entrega</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="endereco" placeholder="Rua, Número, Bairro">
                </div>
                <div class="mb-3">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="cidade" placeholder="Cidade">
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <input type="text" class="form-control" id="estado" placeholder="Estado">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="cep" class="form-label">CEP</label>
                            <input type="text" class="form-control" id="cep" placeholder="00000-000">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Finalizar Compra</button>
    </form>
</div>

<?= $this->endSection() ?>
