<?= $this->extend('loja/layouts/default') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= esc($produto['imagem']) ?>" alt="<?= esc($produto['nome']) ?>" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h1><?= esc($produto['nome']) ?></h1>
            <p class="text-success fw-bold">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
            
            <div class="mb-3">
                <label for="tamanho" class="form-label">Escolha o Tamanho:</label>
                <select id="tamanho" class="form-select">
                    <option value="P">P</option>
                    <option value="M">M</option>
                    <option value="G">G</option>
                    <option value="GG">GG</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="cor" class="form-label">Escolha a Cor:</label>
                <select id="cor" class="form-select">
                    <option value="preto">Preto</option>
                    <option value="branco">Branco</option>
                    <option value="azul">Azul</option>
                    <option value="vermelho">Vermelho</option>
                </select>
            </div>
            
            <a href="<?= route_to('adicionar', $produto['id']) ?>" class="btn btn-success">Adicionar ao Carrinho</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
