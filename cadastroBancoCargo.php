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
            if ($tabela = 'cargo') {
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
            }
            
            break;
        case 'editar':
            
            break;
        case 'excluir':

            // Verifique se o parâmetro 'id' está presente na URL
            if(isset($_GET['id'])) {
                // Sanitize (limpeza) o valor do ID para evitar ataques de injeção de SQL
                $id = htmlspecialchars($_GET['id']);

                $sql = "DELETE FROM cargo WHERE idcargo =".$id;
                

                if ($conn) {
                    if ($conn->query($sql) === TRUE) {
                        header("Location: cadastro_cargo.php");
                        echo  "<script>alert('Excluído com Sucesso!);</script>";
                    } else {
                        echo "Erro ao salvar os dados: " . $conn->error;
                    }
                } else {
                    echo "Erro de conexão com o banco de dados.";
                }
                
                // Faça o que quiser com o ID, por exemplo, exiba-o
                //echo "O ID é: " . $id;
            } else {
                // Se 'id' não estiver presente na URL
                echo "O parâmetro 'id' não foi encontrado na URL.";
            }


            break;
        default:
            echo "Operação inválida!";
    }
}
$conn->close();

