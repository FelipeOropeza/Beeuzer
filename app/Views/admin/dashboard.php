<?= $this->extend('admin/layouts/default') ?>

<?= $this->section('content') ?>
    <h1 class="mt-4">Bem-vindo ao Painel Administrativo</h1>
    <p class="lead">Gerencie produtos, usuários e veja estatísticas.</p>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Produtos</div>
                <div class="card-body">
                    <h5 class="card-title"><?= $produtosCount ?> Produto</h5>
                    <p class="card-text">Gerencie os produtos cadastrados no sistema.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Usuários</div>
                <div class="card-body">
                    <h5 class="card-title"><?= $usuariosCount ?> Usuários</h5>
                    <p class="card-text">Veja e gerencie os usuários cadastrados.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Pedidos</div>
                <div class="card-body">
                    <h5 class="card-title">23 Pedidos</h5>
                    <p class="card-text">Acompanhe os pedidos realizados.</p>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
