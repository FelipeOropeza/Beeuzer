<?php if (session()->getFlashdata('sucesso')): ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#modalAgradecimento').modal('show');

            setTimeout(function () {
                window.location.href = '<?= url_to('meus_pedidos') ?>';
            }, 2550);
        });
    </script>

    <div id="modalAgradecimento" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalAgradecimentoLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgradecimentoLabel">Agradecemos pela sua compra!</h5>
                </div>
                <div class="modal-body">
                    <p>Seu pagamento foi realizado com sucesso. Em breve, você será redirecionado para a página de pedidos
                        feitos.</p>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>