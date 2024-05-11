var tabela = document.getElementById("tabela");
var cadastro = document.getElementById("cadastro");
var cadastrar = document.getElementById("cadastrar");

function displayTabela(){
    cadastrar.addEventListener('click', ()=>{

        tabela.style.display = "none";
        cadastro.style.display = "block";
    });
}

displayTabela();