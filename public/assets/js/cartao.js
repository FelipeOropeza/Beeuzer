document.addEventListener("DOMContentLoaded", function () {
    const cartaoSelecionado = document.getElementById("cartaoSelecionado");
    const numeroCartao = document.getElementById("numeroCartao");
    const dataValidade = document.getElementById("dataValidade");
    const cvv = document.getElementById("cvv");

    cartaoSelecionado.addEventListener("change", function () {
        if (this.value) {
            numeroCartao.disabled = true;
            dataValidade.disabled = true;
            cvv.disabled = true;
        } else {
            numeroCartao.disabled = false;
            dataValidade.disabled = false;
            cvv.disabled = false;
        }
    });
});