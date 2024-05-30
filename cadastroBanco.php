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

        case 'endereco':
            switch ($operacao) {
                case 'inserir':
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $rua = $_POST['rua'];
                        $cidade = $_POST['cidade'];
                        $cep = $_POST['cep'];
                        $numero = $_POST['numero'];
                        $cliente = $_POST['idCliente'];

                        $sql = "INSERT INTO endereco (rua, cidade, cep, numero, cpfCliente) VALUES ('$rua', '$cidade', '$cep', '$numero','$cliente')";
                        
                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: Endereco.php");
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

                        $sql = "DELETE FROM endereco WHERE idEndereco =".$id;

                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: Endereco.php");
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

            case 'promocao':
                switch ($operacao) {
                    case 'inserir':
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $tipo = $_POST['tipo'];
                            $valor = $_POST['valor'];
                            
                            $sql = "INSERT INTO promocao (tipo, valor) VALUES ('$tipo', '$valor')";
                            
                            if ($conn) {
                                if ($conn->query($sql) === TRUE) {
                                    header("Location: cadastro_promocao.php");
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
    
                            $sql = "DELETE FROM promocao WHERE idPromocao =".$id;
    
                            if ($conn) {
                                if ($conn->query($sql) === TRUE) {
                                    header("Location: cadastro_promocao.php");
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

        case 'desconto':
            switch ($operacao) {
                case 'inserir':
                    // Verificar se o formulário foi submetido
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Recupera os dados do formulário
                        $descricao = $_POST['descricao'];
                        $valor = $_POST['valor'];
                    
                        // Insere os dados no banco de dados
                        $sql = "INSERT INTO desconto (descricao, valor) VALUES ('$descricao', '$valor')";
                        
                        // Verifica se a conexão está estabelecida antes de executar a consulta
                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: desconto.php");
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
    
                        $sql = "DELETE FROM desconto WHERE idDesconto =".$id;
    
                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: desconto.php");
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

            case 'cat_produto':
                switch ($operacao) {
                    case 'inserir':
                        // Verificar se o formulário foi submetido
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Recupera os dados do formulário
                            $tipo = $_POST['tipo'];
                        
                            // Insere os dados no banco de dados
                            $sql = "INSERT INTO cat_produto (tipo) VALUES ('$tipo')";
                            
                            // Verifica se a conexão está estabelecida antes de executar a consulta
                            if ($conn) {
                                if ($conn->query($sql) === TRUE) {
                                    header("Location: cadastro_categoria.php");
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
        
                            $sql = "DELETE FROM cat_produto WHERE idCat_produto =".$id;
        
                            if ($conn) {
                                if ($conn->query($sql) === TRUE) {
                                    header("Location: cadastro_categoria.php");
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

        case 'forma_pagamento':
            switch ($operacao) {
                case 'inserir':
                    // Verificar se o formulário foi submetido
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Recupera os dados do formulário
                        $tipo = $_POST['tipo'];
                    
                        // Insere os dados no banco de dados
                        $sql = "INSERT INTO forma_pagamento (tipo) VALUES ('$tipo')";
                        
                        // Verifica se a conexão está estabelecida antes de executar a consulta
                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: formaPagamento.php");
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

                        $sql = "DELETE FROM forma_pagamento WHERE idForma_pagamento =".$id;

                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: formaPagamento.php");
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

        case 'produto':
            switch ($operacao) {
                case 'inserir':
                    // Verificar se o formulário foi submetido
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Recupera os dados do formulário
                        $nome = $_POST['nome'];
                        $descricao = $_POST['descricao'];
                        $qtde = $_POST['qtde'];
                        $idCat_produto = $_POST['idCat_produto'];
                        $idPromocao = $_POST['idPromocao'];
                    
                        // Insere os dados no banco de dados
                        $sql = "INSERT INTO produto (nome, descricao, qtde, idCat_produto, idPromocao) VALUES ('$nome','$descricao','$qtde','$idCat_produto','$idPromocao')";
                        
                        // Verifica se a conexão está estabelecida antes de executar a consulta
                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: cadastro_produtos.php");
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

                        $sql = "DELETE FROM produto WHERE idProduto =".$id;

                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: cadastro_produtos.php");
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
            echo "Operação inválida!";
    }

}
$conn->close();
