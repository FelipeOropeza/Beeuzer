<div id="modalCartao" style="display: none;">
    <form action="<?= base_url('cartoes/cadastrar') ?>" method="post">
        <label>Nome do Titular:</label>
        <input type="text" name="nome_titular" required>
        <label>Número do Cartão:</label>
        <input type="text" name="numero_cartao" required>
        <label>Validade:</label>
        <input type="date" name="validade" required>
        <label>Tipo do Cartão:</label>
        <input type="text" name="tipo_cartao" required>
        <label>Status:</label>
        <input type="text" name="status" required>
        <button type="submit">Cadastrar</button>
        <button type="button" onclick="fecharModal()">Fechar</button>
    </form>
</div>

<script>
    function abrirModal() {
        document.getElementById('modalCartao').style.display = 'block';
    }

    function fecharModal() {
        document.getElementById('modalCartao').style.display = 'none';
    }
</script>