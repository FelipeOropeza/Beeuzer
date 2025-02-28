<?= $this->extend('loja/layouts/default') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <h2 class="text-center mb-4">Informações de Pagamento</h2>
    <form action="<?= url_to('finalizar_pedido'); ?>" method="POST">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Detalhes do Cartão</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="cartaoSelecionado" class="form-label">Selecionar Cartão Salvo</label>
                            <select id="cartaoSelecionado" name="cartaoSelecionado" class="form-control">
                                <option value="">Selecione um cartão</option>
                                <?php foreach ($cartoes as $cartao) : ?>
                                    <option value="<?= $cartao['id'] ?>">Cartão **** <?= substr($cartao['numero_cartao'], -4) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="numeroCartao" class="form-label">Número do Cartão</label>
                            <input type="text" class="form-control" id="numeroCartao" name="numeroCartao" placeholder="0000 0000 0000 0000">
                        </div>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label for="dataValidade" class="form-label">Validade</label>
                                <input type="month" class="form-control" id="dataValidade" name="dataValidade">
                            </div>
                            <div class="col-md-6">
                                <label for="cvv" class="form-label">CVV</label>
                                <input type="text" class="form-control" id="cvv" name="cvv" placeholder="123">
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
                                <input type="text" class="form-control" id="cep" name="cep" placeholder="00000-000">
                            </div>
                            <div class="col-md-8">
                                <label for="endereco" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua, Número">
                            </div>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-md-4">
                                <label for="bairro" class="form-label">Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro">
                            </div>
                            <div class="col-md-4">
                                <label for="cidade" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade">
                            </div>
                            <div class="col-md-4">
                                <label for="estado" class="form-label">Estado</label>
                                <input type="text" class="form-control" id="estado" name="estado" placeholder="UF">
                            </div>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-md-4">
                                <label for="numero" class="form-label">Número</label>
                                <input type="text" class="form-control" id="numero" name="numero" placeholder="Número da Casa">
                            </div>
                            <div class="col-md-8">
                                <label for="numero" class="form-label">Complemento (opicional)</label>
                                <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento da Casa">
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
<script src="<?= base_url('assets/js/cartao.js') ?>"></script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>