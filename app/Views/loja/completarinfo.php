<?= $this->extend('loja/layouts/default') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <h2 class="text-center mb-4">Informações de Pagamento</h2>
    <form action="#" method="POST">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Detalhes do Cartão</h5>
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
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label for="dataValidade" class="form-label">Validade</label>
                                <input type="month" class="form-control" id="dataValidade">
                            </div>
                            <div class="col-md-6">
                                <label for="cvv" class="form-label">CVV</label>
                                <input type="text" class="form-control" id="cvv" placeholder="123">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">Endereço de Entrega</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <label for="cep" class="form-label">CEP</label>
                                <input type="text" class="form-control" id="cep" placeholder="00000-000">
                            </div>
                            <div class="col-md-8">
                                <label for="endereco" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="endereco" placeholder="Rua, Número">
                            </div>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-md-4">
                                <label for="bairro" class="form-label">Bairro</label>
                                <input type="text" class="form-control" id="bairro" placeholder="Bairro">
                            </div>
                            <div class="col-md-4">
                                <label for="cidade" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="cidade" placeholder="Cidade">
                            </div>
                            <div class="col-md-4">
                                <label for="estado" class="form-label">Estado</label>
                                <input type="text" class="form-control" id="estado" placeholder="UF">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success btn-lg">Finalizar Compra</button>
        </div>
    </form>
</div>

<?= $this->section('javascript') ?>
<script src="<?= base_url('assets/js/buscarCEP.js') ?>"></script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>