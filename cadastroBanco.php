<?php
include ("config.php");

// Verificando a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

if (isset($_GET['operacao']) && isset($_GET['tabela'])) {
    $operacao = $_GET['operacao'];
    $tabela = $_GET['tabela'];
    
    // Processar a operação correspondente
    switch ($tabela) {
        case 'cargo':
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
                                exit();
                            } else {
                                echo "Erro ao salvar os dados: " . $conn->error;
                            }
                        } else {
                            echo "Erro de conexão com o banco de dados.";
                        }
                    }
                    break;

                case 'editar':
                    // Código para editar
                    break;

                case 'excluir':
                    if (isset($_GET['id'])) {
                        $id = htmlspecialchars($_GET['id']);
    
                        $sql = "DELETE FROM cargo WHERE idcargo =".$id;
    
                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: cadastro_cargo.php");
                                exit();
                            } else {
                                echo "Erro ao excluir os dados: " . $conn->error;
                            }
                        } else {
                            echo "Erro de conexão com o banco de dados.";
                        }
                    } else {
                        echo "O parâmetro 'id' não foi encontrado na URL.";
                    }
                    break;

                default:
                    echo "Operação inválida!";
            }
            break;

        case 'funcionario':
            switch ($operacao) {
                case 'inserir':
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $cpf = $_POST['cpf'];
                        $nome = $_POST['nome'];
                        $telefone = $_POST['telefone'];
                        $rg = $_POST['rg'];
                        $cargo = $_POST['idcargo'];

                        $sql = "INSERT INTO funcionario (cpf, nome, telefone, rg, idCargo) VALUES ('$cpf', '$nome', '$telefone', '$rg','$cargo')";
                        
                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: cadastro_funcionario.php");
                                exit();
                            } else {
                                echo "Erro ao salvar os dados: " . $conn->error;
                            }
                        } else {
                            echo "Erro de conexão com o banco de dados.";
                        }
                    }
                    break;

                case 'editar':
                    // Código para editar
                    break;

                case 'excluir':
                    if (isset($_GET['idfunc'])) {
                        $id = htmlspecialchars($_GET['idfunc']);

                        $sql = "DELETE FROM funcionario WHERE cpf =".$id;

                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: cadastro_funcionario.php");
                                exit();
                            } else {
                                echo "Erro ao excluir os dados: " . $conn->error;
                            }
                        } else {
                            echo "Erro de conexão com o banco de dados.";
                        }
                    } else {
                        echo "O parâmetro 'id' não foi encontrado na URL.";
                    }
                    break;

                default:
                    echo "Operação inválida!";
            }
            break;

        case 'fornecedor':
            switch ($operacao) {
                case 'inserir':
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $cnpj = $_POST['cnpj'];
                        $empresa = $_POST['empresa'];
                        $telefone = $_POST['telefone'];

                        $sql = "INSERT INTO fornecedor (cnpj, nome_empresa, telefone) VALUES ('$cnpj', '$empresa', '$telefone')";
                        
                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: cadastro_fornecedor.php");
                                exit();
                            } else {
                                echo "Erro ao salvar os dados: " . $conn->error;
                            }
                        } else {
                            echo "Erro de conexão com o banco de dados.";
                        }
                    }
                    break;

                case 'editar':
                    // Código para editar
                    break;

                case 'excluir':
                    if (isset($_GET['id'])) {
                        $id = htmlspecialchars($_GET['id']);

                        $sql = "DELETE FROM fornecedor WHERE cnpj =".$id;

                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: cadastro_fornecedor.php");
                                exit();
                            } else {
                                echo "Erro ao excluir os dados: " . $conn->error;
                            }
                        } else {
                            echo "Erro de conexão com o banco de dados.";
                        }
                    } else {
                        echo "O parâmetro 'id' não foi encontrado na URL.";
                    }
                    break;

                default:
                    echo "Operação inválida!";
            }
            break;

        case 'cliente':
            switch ($operacao) {
                case 'inserir':
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $cpf = $_POST['cpf'];
                        $nome = $_POST['nome'];
                        $email = $_POST['email'];
                        $rg = $_POST['rg'];
                        $telefone = $_POST['telefone'];

                        $sql = "INSERT INTO cliente (cpf, nome, telefone, rg, email) VALUES ('$cpf', '$nome', '$telefone', '$rg','$email')";
                        
                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: cadastro_cliente.php");
                                exit();
                            } else {
                                echo "Erro ao salvar os dados: " . $conn->error;
                            }
                        } else {
                            echo "Erro de conexão com o banco de dados.";
                        }
                    }
                    break;

                case 'editar':
                    // Código para editar
                    break;

                case 'excluir':
                    if (isset($_GET['id'])) {
                        $id = htmlspecialchars($_GET['id']);

                        $sql = "DELETE FROM cliente WHERE cpf =".$id;

                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: cadastro_cliente.php");
                                exit();
                            } else {
                                echo "Erro ao excluir os dados: " . $conn->error;
                            }
                        } else {
                            echo "Erro de conexão com o banco de dados.";
                        }
                    } else {
                        echo "O parâmetro 'id' não foi encontrado na URL.";
                    }
                    break;

                default:
                    echo "Operação inválida!";
            }
            break;

        case 'receita':
            switch ($operacao) {
                case 'inserir':
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $tipo = $_POST['tipo'];
                        $cpf = $_POST['cpfcliente'];

                        $sql = "INSERT INTO receita (tipo, cpfCliente) VALUES ('$tipo', '$cpf')";
                        
                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: cadastro_receita.php");
                                exit();
                            } else {
                                echo "Erro ao salvar os dados: " . $conn->error;
                            }
                        } else {
                            echo "Erro de conexão com o banco de dados.";
                        }
                    }
                    break;

                case 'editar':
                    // Código para editar
                    break;

                case 'excluir':
                    if (isset($_GET['id'])) {
                        $id = htmlspecialchars($_GET['id']);

                        $sql = "DELETE FROM receita WHERE idReceita =".$id;

                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: cadastro_receita.php");
                                exit();
                            } else {
                                echo "Erro ao excluir os dados: " . $conn->error;
                            }
                        } else {
                            echo "Erro de conexão com o banco de dados.";
                        }
                    } else {
                        echo "O parâmetro 'id' não foi encontrado na URL.";
                    }
                    break;

                default:
                    echo "Operação inválida!";
            }
            break;

        default:
            echo "Tabela inválida!";
    }
}
$conn->close();

