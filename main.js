var tabela = document.getElementById("tabela");
var cadastro = document.getElementById("cadastro");
var cadastrar = document.getElementById("cadastrar");
var cancelar = document.getElementById('cancelar');

function displayTabela(){
    cadastrar.addEventListener('click', ()=>{

        tabela.style.display = "none";
        cadastro.style.display = "block";
    });
}

function cancelarCadastro(){
    cancelar.addEventListener('click',() =>{
        divForm.style.display = 'none';
        div.style.display = 'block';
    })
}

displayTabela();