 document.addEventListener('DOMContentLoaded', function () {
        var modal = document.getElementById('modalEditarVariacao');

        modal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var produtoId = button.getAttribute('data-produto-id');
            var produtoPreco = button.getAttribute('data-produto-preco');

            var modalProdutoId = modal.querySelector('#produto_id');
            var modalPreco = modal.querySelector('#preco');

            modalProdutoId.value = produtoId;
            modalPreco.value = produtoPreco;

            modalPreco.focus();
        });

        modal.addEventListener('shown.bs.modal', function () {
            modal.setAttribute('aria-hidden', 'false');
            modal.classList.add('show');
        });

        modal.addEventListener('hidden.bs.modal', function () {
            modal.setAttribute('aria-hidden', 'true');
            modal.classList.remove('show');
        });
    });