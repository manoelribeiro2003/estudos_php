function V_nome(campo) {
    if (campo.value.trim() == '') {
        document.getElementById('alertaNome').innerHTML = '*Campo obrigatório';
        document.getElementById('alertaNome').style.color = 'red';
    }else{
        document.getElementById('alertaNome').innerHTML = '';
    }
}

function V_data(campo) {
    if (campo.value.trim() == '') {
        document.getElementById('alertaData').innerHTML = '*Campo obrigatório';
        document.getElementById('alertaData').style.color = 'red';
    }else{
        document.getElementById('alertaData').innerHTML = '';
    }
}

function V_cpf(campo){
    if (campo.value.trim() == '') {
        document.getElementById('alertaCpf').innerHTML = '*Campo obrigatório';
        document.getElementById('alertaCpf').style.color = 'red';
    }else{
        document.getElementById('alertaCpf').innerHTML = '';
    }
}

function V_cadastrar() {
    n = document.getElementById('nome');
    d = document.getElementById('data');
    c = document.getElementById('cpf');

    V_nome(n);
    V_data(d);
    V_cpf(c);
}

function formatCpf(campo) {
    let cpf = campo.value.replace(/\D/g,''); //Remove todos os caracteres não numéricos
    cpf = cpf.substring(0,11); //Limita o cpf a 11 dígitos (sem formatação)
    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona o primeiro ponto
    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona o segundo ponto
    cpf = cpf.replace(/(\d{3})(\d)/, '$1-$2'); // Adiciona o hífen
    //cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d)/, '$1.$2.$3-$4'); // Adiciona o primeiro ponto
    campo.value = cpf; // Define o valor formatado no campo
}