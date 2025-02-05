<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
</head>
<body>
    <h1>Produtos</h1>
    <ul>
        <?php foreach ($produtos as $produto): ?>
            <li>
                <h2><?= $produto['nome'] ?></h2>
                <p>Preço: R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
                <a href="<?= route_to('adicionar', $produto['id']) ?>">Adicionar ao Carrinho</a>            </li>
        <?php endforeach; ?>
    </ul>
    <a href="/carrinho">Ver Carrinho</a>
</body>
</html>