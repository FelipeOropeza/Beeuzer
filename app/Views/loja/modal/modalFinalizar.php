<?php if (session()->getFlashdata('sucesso')): ?>
    <div class="modal fade" id="modalSucesso" tabindex="-1" aria-labelledby="modalSucessoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSucessoLabel">🎉 Pedido Confirmado!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <p><?= session()->getFlashdata('sucesso') ?></p>
                    <p>Agora vá até <strong>Meus Pedidos</strong> para finalizar o pagamento e a entrega.</p>
                </div>
                <div class="modal-footer">
                    <a href="<?= url_to('meus_pedidos') ?>" class="btn btn-primary">📦 Ir para Meus Pedidos</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var modalSucesso = new bootstrap.Modal(document.getElementById('modalSucesso'));
            modalSucesso.show();
        });
    </script>
<?php endif; ?>