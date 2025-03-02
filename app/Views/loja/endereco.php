<?= $this->extend('loja/layouts/default') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <h2 class="text-center mb-4">Endereço de Entrega</h2>
    <form action="<?= url_to('finalizar_endereco'); ?>" method="POST">
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">
                <h5 class="mb-0">Endereço</h5>
            </div>
            <div class="card-body">
                <div class="row g-2">
                    <div class="col-md-4">
                        <label for="cep" class="form-label">CEP</label>
                        <input type="text" class="form-control" id="cep" name="cep" placeholder="00000-000"
                            value="<?= old('cep') ?>">
                        <?php if (isset(session('validation')['cep'])): ?>
                            <div class="text-danger small">
                                <?= session('validation')['cep'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-8">
                        <label for="rua" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua"
                            value="<?= old('rua') ?>">
                        <?php if (isset(session('validation')['rua'])): ?>
                            <div class="text-danger small">
                                <?= session('validation')['rua'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row g-2 mt-2">
                    <div class="col-md-4">
                        <label for="bairro" class="form-label">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro"
                            value="<?= old('bairro') ?>">
                        <?php if (isset(session('validation')['bairro'])): ?>
                            <div class="text-danger small">
                                <?= session('validation')['bairro'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-4">
                        <label for="cidade" class="form-label">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade"
                            value="<?= old('cidade') ?>">
                        <?php if (isset(session('validation')['cidade'])): ?>
                            <div class="text-danger small">
                                <?= session('validation')['cidade'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-4">
                        <label for="estado" class="form-label">Estado</label>
                        <input type="text" class="form-control" id="estado" name="estado" placeholder="UF"
                            value="<?= old('estado') ?>">
                        <?php if (isset(session('validation')['estado'])): ?>
                            <div class="text-danger small">
                                <?= session('validation')['estado'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row g-2 mt-2">
                    <div class="col-md-5">
                        <label for="numero" class="form-label">Número</label>
                        <input type="text" class="form-control" id="numero" name="numero" placeholder="Número da Casa"
                            value="<?= old('numero') ?>">
                        <?php if (isset(session('validation')['numero'])): ?>
                            <div class="text-danger small">
                                <?= session('validation')['numero'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-7">
                        <label for="complemento" class="form-label">Complemento (opcional)</label>
                        <input type="text" class="form-control" id="complemento" name="complemento"
                            placeholder="Complemento" value="<?= old('complemento') ?>">
                        <?php if (isset(session('validation')['complemento'])): ?>
                            <div class="text-danger small">
                                <?= session('validation')['complemento'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary btn-lg">Continuar para o Pagamento</button>
        </div>
    </form>
</div>

<?= $this->section('javascript') ?>
<script src="<?= base_url('assets/js/buscarCEP.js') ?>"></script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>