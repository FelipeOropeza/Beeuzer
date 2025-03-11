document.getElementById('cep').addEventListener('blur', function () {
    let cep = this.value.replace(/\D/g, '');
    if (cep.length === 8) {
        fetch(`/buscar-cep/${cep}`)
            .then(response => response.json())
            .then(data => {
                if (!data.erro) {
                    document.getElementById('rua').value = data.logradouro;
                    document.getElementById('bairro').value = data.bairro;
                    document.getElementById('cidade').value = data.localidade;
                    document.getElementById('estado').value = data.uf;
                } else {
                    alert('CEP não encontrado!');
                }
            })
            .catch(error => console.error('Erro ao buscar CEP:', error));
    }
});

window.addEventListener('DOMContentLoaded', function () {
    var erroAlerts = document.querySelectorAll('.text-danger small');

    erroAlerts.forEach(function(alert) {
        setTimeout(function () {
            alert.style.display = 'none';
        }, 2500);
    });
});