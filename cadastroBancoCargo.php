<?php
   include ("config.php");
  
   // Verificando a conexão
   if ($conn->connect_error) {
       die("Erro na conexão: " . $conn->connect_error);
   }

//    if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Recupera os dados do formulário
//     $descricao = $_POST['descricao'];
//     $salario = $_POST['salario'];
//     echo $descricao;

//     // Insere os dados no banco de dados
//     $sql = "INSERT INTO cargo (descricao, salario) VALUES ('$descricao', '$salario')";
    
//     // Verifica se a conexão está estabelecida antes de executar a consulta
//     if ($conn) {
//          if ($conn->query($sql) === TRUE) {
//             header("Location: cadastro_cargo.php");
//             echo  "<script>alert('Cadastrado com Sucesso!);</script>";
//          } else {
//              echo "Erro ao salvar os dados: " . $conn->error;
//          }
//      } else {
//          echo "Erro de conexão com o banco de dados.";
//      }
// }
   if (isset($_GET['operacao']) && isset($_GET['tabela'])) {
    $operacao = $_GET['operacao'];
    $tabela = $_GET['tabela'];
    
    // Processar a operação correspondente
    switch ($operacao) {
        case 'inserir':
            // Verificar se o formulário foi submetido
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Recupera os dados do formulário
                $descricao = $_POST['descricao'];
                $salario = $_POST['salario'];
            
                // Insere os dados no banco de dados
                $sql = "INSERT INTO cargo (descricao, salario) VALUES ('$descricao', '$salario')";
                
                // Verifica se a conexão está estabelecida antes de executar a consulta
                if ($conn) {
                     if ($conn->query($sql) === TRUE) {
                        header("Location: cadastro_cargo.php");
                        echo  "<script>alert('Cadastrado com Sucesso!);</script>";
                     } else {
                         echo "Erro ao salvar os dados: " . $conn->error;
                     }
                 } else {
                     echo "Erro de conexão com o banco de dados.";
                 }
            }
            break;
        case 'editar':
            
            break;
        case 'excluir':
            // $sql = 'DELETE FROM cargo WHERE idcargo= '$idcargo'';
            break;
        default:
            echo "Operação inválida!";
    }
}
$conn->close();

