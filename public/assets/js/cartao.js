document.addEventListener("DOMContentLoaded", function () {
    const cartaoSelecionado = document.getElementById("cartaoSelecionado");
    const numeroCartao = document.getElementById("numeroCartao");
    const dataValidade = document.getElementById("dataValidade");
    const nometitular = document.getElementById("nome_titular");
    const tipoCartao = document.getElementById("tipo_cartao");
    const cvv = document.getElementById("cvv");

    cartaoSelecionado.addEventListener("change", function () {
        if (this.value) {
            numeroCartao.disabled = true;
            dataValidade.disabled = true;
            nometitular.disabled = true;
            tipoCartao.disabled = true;
            cvv.disabled = true;
        } else {
            numeroCartao.disabled = false;
            dataValidade.disabled = false;
            nometitular.disabled = false;
            tipoCartao.disabled = false;
            cvv.disabled = false;
        }
    });
});