<?php
   include ("config.php");
   $servername = "localhost"; // Hostname do servidor MySQL (geralmente localhost)
   $username = "root"; // Nome de usuário do MySQL (padrão é root)
   $password = "rafael123"; // Senha do MySQL (por padrão, está vazia)
   $database = "farmacia"; // Nome do banco de dados que você deseja se conectar
   
   // Criando uma conexão com o banco de dados
   $conn = new mysqli($servername, $username, $password, $database);
   
   // Verificando a conexão
   if ($conn->connect_error) {
       die("Erro na conexão: " . $conn->connect_error);
   }

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $descricao = $_POST['descricao'];
    $salario = $_POST['salario'];
    echo $descricao;

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
   // Após usar a conexão, você pode realizar operações no banco de dados aqui
   
   // Fechando a conexão
   $conn->close();