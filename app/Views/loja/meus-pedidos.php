<?= $this->extend('loja/layouts/defaultperfil') ?>

<?= $this->section('content') ?>
<h2 class="text-2xl font-semibold mb-6 text-gray-800 ml-4">📦 Meus Pedidos</h2>

<?php if (empty($pedidos)): ?>
    <div class="p-6 bg-white border border-gray-300 rounded-lg shadow-md text-center ml-4">
        <p class="text-gray-500 text-sm">Você ainda não realizou nenhum pedido.</p>
    </div>
<?php else: ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 ml-4">
        <?php foreach ($pedidos as $pedido): ?>
            <div class="bg-white border border-gray-200 rounded-lg shadow-lg p-4 transition hover:shadow-xl">
                <div class="flex items-center justify-between border-b pb-3 mb-3">
                    <h3 class="text-lg font-medium text-gray-800">Pedido #<?= $pedido['id'] ?></h3>
                    <span class="text-xs text-gray-500">📅 <?= $pedido['datapedido'] ?></span>
                </div>
                <p class="text-gray-600 text-sm"><strong>Total:</strong>
                    <span class="text-green-600 font-semibold">R$
                        <?= number_format($pedido['totalpedido'], 2, ',', '.') ?></span>
                </p>
                <p class="text-gray-600 text-sm"><strong>Cartão:</strong>
                    <?= $pedido['cartao'] ? $pedido['metodo_pagamento_completo'] : '<span class="text-red-500">Não informado</span>' ?>
                </p>
                <?php if ($pedido['endereco_completo'] != '') { ?>
                    <p class="text-gray-600 text-sm"><strong>Endereço de entrega:</strong>
                        <?= $pedido['endereco'] ? $pedido['endereco_completo'] : '<span class="text-red-500">Não informado</span>' ?>
                    </p>
                <?php } else { ?>
                    <?php if (empty($endereco)) { ?>
                        <p class="text-gray-600 text-sm"><strong>Endereço de entrega:</strong>
                            <span class="text-red-500">Não informado</span>
                        </p>
                    <?php } else { ?>
                        <p class="text-gray-600 text-sm"><strong>Endereço de entrega:</strong>
                            <?= $endereco['rua'] . ', ' . $endereco['numero'] . ' - ' . $endereco['bairro'] . ', ' . $endereco['cidade'] . ' - ' . $endereco['estado'] ?>
                        </p>
                    <?php } ?>
                <?php } ?>
                <p class="mt-3 text-sm">
                    <strong class="text-gray-700">Status:</strong>
                    <?php if ($pedido['status_pedido'] === 'Aprovado'): ?>
                        <span class="inline-block px-2 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">
                            ✔️ Está tudo certo com seu pedido!
                        </span>
                    <?php elseif ($pedido['status_pedido'] === 'Pendente'): ?>
                        <span class="inline-block px-2 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-medium">
                            ⏳ Informações ainda faltam no seu pedido!
                        </span>
                    <?php else: ?>
                        <span class="inline-block px-2 py-1 rounded-full bg-red-100 text-red-700 text-xs font-medium">
                            ❌ Recusado
                        </span>
                    <?php endif; ?>
                </p>
                <div class="mt-4 d-flex gap-2">
                    <?php if ($pedido['endereco_completo'] != '') { ?>
                        <?php if ($pedido['status_pedido'] != 'Aprovado') { ?>
                            <?php if ($pedido['status_pedido'] == 'Pendente') { ?>
                                <a href="<?= route_to('endereco', $pedido['id']) ?>">
                                    <button class="btn btn-primary btn-sm" style="width: auto;">
                                        Completar Informações
                                    </button>
                                </a>
                            <?php } ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php if (!empty($endereco)) { ?>
                            <a href="<?= route_to('endereco', $pedido['id']) ?>">
                                <button class="btn btn-warning btn-sm" style="width: auto;">
                                    Mudar endereco de entrega
                                </button>
                            </a>

                            <a href="<?= route_to('pagamento', $pedido['id']) ?>">
                                <button class="btn btn-primary btn-sm" style="width: auto;">
                                    Continuar com o pagamento
                                </button>
                            </a>
                        <?php } else { ?>
                            <a href="<?= route_to('endereco', $pedido['id']) ?>">
                                <button class="btn btn-primary btn-sm" style="width: auto;">
                                    Completar Informações
                                </button>
                            </a>
                        <?php } ?>
                    <?php } ?>

                    <button class="btn btn-danger btn-sm" style="width: auto;">
                        Excluir
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?= $this->endSection() ?>