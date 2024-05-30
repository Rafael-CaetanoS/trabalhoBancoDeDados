var tabela = document.getElementById("tabela");
var cadastrar = document.getElementById("cadastrar");
var cancelarcadastro = document.getElementById("cancelar");


function displayTabela(){
    cadastrar.addEventListener('click', ()=>{
        tabela.style.display = "none";
        cadastro.style.display = "block";
    });
}
function cancelar(){
    cancelarcadastro.addEventListener('click', ()=>{
        tabela.style.display = "block";
        cadastro.style.display = "none";
    });
}

displayTabela();
cancelar();