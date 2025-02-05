<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Carrinho de Compras</title>
</head>
<body>
    <h1>Carrinho de Compras</h1>
    <ul>
        <?php foreach ($itens as $item): ?>
            <li>
                <h2><?= $item['produto']['nome'] ?></h2>
                <p>Quantidade: <?= $item['quantidade'] ?></p>
                <p>Preço: R$ <?= number_format($item['produto']['preco'], 2, ',', '.') ?></p>
                <a href="<?= route_to('remover', $item['id_carrinho']) ?>">Remover</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="/">Continuar Comprando</a>
</body>
</html>