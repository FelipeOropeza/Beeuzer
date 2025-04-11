<?= $this->extend('loja/layouts/defaultperfil') ?>

<?= $this->section('content') ?>
<h2>📄 Meus Dados</h2>
<p>Aqui você pode visualizar e editar seus dados pessoais.</p>

<div class="user-info" style="margin-top: 20px;">
    <ul style="list-style: none; padding: 0;">
        <li><strong>Nome:</strong> <?= esc($usuario['nome']) ?></li>
        <li><strong>Email:</strong> <?= esc($usuario['email']) ?></li>
    </ul>

    <div style="margin-top: 30px;">
        <form action="<?= url_to('excluir_conta') ?>" method="post" onsubmit="return confirm('Tem certeza que deseja excluir sua conta? Essa ação não poderá ser desfeita.');" style="display: inline;">
            <?= csrf_field() ?>
            <button type="submit" class="btn btn-danger">🗑️ Deletar Conta</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
