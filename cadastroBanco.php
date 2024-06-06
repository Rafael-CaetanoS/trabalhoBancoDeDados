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
                    if (isset($_GET['id'])) {
                        $id = htmlspecialchars($_GET['id']);

                        $descricao = $_POST['descricao'];
                        $salario = $_POST['salario'];

                        $sql = "UPDATE cargo SET descricao='{$descricao}', salario='{$salario}' WHERE idCargo = ".$id;
                            
                        // Verifica se a conexão está estabelecida antes de executar a consulta
                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: cadastro_cargo.php");
                                exit();
                            } else {
                                echo "Erro ao editar os dados: " . $conn->error;
                            }
                        } else {
                            echo "Erro de conexão com o banco de dados.";
                        }
                    } else {
                        echo "O parâmetro 'id' não foi encontrado na URL.";
                    }
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
                    if (isset($_GET['id'])) {
                        $id = htmlspecialchars($_GET['id']);

                        $cpf = $_POST['cpf'];
                        $nome = $_POST['nome'];
                        $telefone = $_POST['telefone'];
                        $rg = $_POST['rg'];
                        $cargo = $_POST['idcargo'];

                        $sql = "UPDATE funcionario SET cpf='{$cpf}',nome='{$nome}',telefone='{$telefone}',rg='{$rg}',idcargo='{$cargo}' WHERE cpf = ".$id;
                            
                        // Verifica se a conexão está estabelecida antes de executar a consulta
                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: cadastro_funcionario.php");
                                exit();
                            } else {
                                echo "Erro ao editar os dados: " . $conn->error;
                            }
                        } else {
                            echo "Erro de conexão com o banco de dados.";
                        }
                    } else {
                        echo "O parâmetro 'id' não foi encontrado na URL.";
                    }
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
                    if (isset($_GET['id'])) {
                        $id = htmlspecialchars($_GET['id']);

                        $cnpj = $_POST['cnpj'];
                        $nome_empresa = $_POST['nome_empresa'];
                        $telefone = $_POST['telefone'];

                        $sql = "UPDATE fornecedor SET cnpj='{$cnpj}',nome_empresa='{$nome_empresa}',telefone='{$telefone}' WHERE cnpj = ".$id;
                            
                        // Verifica se a conexão está estabelecida antes de executar a consulta
                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: cadastro_fornecedor.php");
                                exit();
                            } else {
                                echo "Erro ao editar os dados: " . $conn->error;
                            }
                        } else {
                            echo "Erro de conexão com o banco de dados.";
                        }
                    } else {
                        echo "O parâmetro 'id' não foi encontrado na URL.";
                    }
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
                    if (isset($_GET['id'])) {
                        $id = htmlspecialchars($_GET['id']);

                        $cpf = $_POST['cpf'];
                        $nome = $_POST['nome'];
                        $telefone = $_POST['telefone'];
                        $rg = $_POST['rg'];
                        $email = $_POST['email'];

                        $sql = "UPDATE cliente SET cpf='{$cpf}',nome='{$nome}',telefone='{$telefone}',rg='{$rg}',email='{$email}' WHERE cpf = ".$id;
                            
                        // Verifica se a conexão está estabelecida antes de executar a consulta
                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: cadastro_cliente.php");
                                exit();
                            } else {
                                echo "Erro ao editar os dados: " . $conn->error;
                            }
                        } else {
                            echo "Erro de conexão com o banco de dados.";
                        }
                    } else {
                        echo "O parâmetro 'id' não foi encontrado na URL.";
                    }
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
                    if (isset($_GET['id'])) {
                        $id = htmlspecialchars($_GET['id']);

                        $tipo = $_POST['tipo'];
                        $cpfCliente= $_POST['cpfCliente'];

                        $sql = "UPDATE receita SET tipo='{$tipo}',cpfCliente='{$cpfCliente}' WHERE idReceita = ".$id;
                            
                        // Verifica se a conexão está estabelecida antes de executar a consulta
                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: cadastro_receita.php");
                                exit();
                            } else {
                                echo "Erro ao editar os dados: " . $conn->error;
                            }
                        } else {
                            echo "Erro de conexão com o banco de dados.";
                        }
                    } else {
                        echo "O parâmetro 'id' não foi encontrado na URL.";
                    }
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
                        $cliente = $_POST['cpfCliente'];

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
                    if (isset($_GET['id'])) {
                        $id = htmlspecialchars($_GET['id']);

                        $rua = $_POST['rua'];
                        $cidade = $_POST['cidade'];
                        $cep = $_POST['cep'];
                        $numero = $_POST['numero'];
                        $cliente = $_POST['cpfCliente'];

                        $sql = "UPDATE endereco SET rua='{$rua}', cidade='{$cidade}', cep='{$cep}', numero='{$numero}', cpfCliente='{$cliente}' WHERE idEndereco = ".$id;
                            
                        // Verifica se a conexão está estabelecida antes de executar a consulta
                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: endereco.php");
                                exit();
                            } else {
                                echo "Erro ao editar os dados: " . $conn->error;
                            }
                        } else {
                            echo "Erro de conexão com o banco de dados.";
                        }
                    } else {
                        echo "O parâmetro 'id' não foi encontrado na URL.";
                    }
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
                        if (isset($_GET['id'])) {
                            $id = htmlspecialchars($_GET['id']);
    
                            $tipo = $_POST['tipo'];
                            $valor = $_POST['valor'];
    
                            $sql = "UPDATE promocao SET tipo='{$tipo}', valor='{$valor}' WHERE idPromocao = ".$id;
                                
                            // Verifica se a conexão está estabelecida antes de executar a consulta
                            if ($conn) {
                                if ($conn->query($sql) === TRUE) {
                                    header("Location: cadastro_promocao.php");
                                    exit();
                                } else {
                                    echo "Erro ao editar os dados: " . $conn->error;
                                }
                            } else {
                                echo "Erro de conexão com o banco de dados.";
                            }
                        } else {
                            echo "O parâmetro 'id' não foi encontrado na URL.";
                        }
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
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $id = htmlspecialchars($_GET['id']);
                        // Recupera os dados do formulário
                        $descricao = $_POST['descricao'];
                        $valor = $_POST['valor'];
                    
                        // Insere os dados no banco de dados
                        $sql = "UPDATE desconto SET descricao='{$descricao}', valor='{$valor}' WHERE idDesconto = ".$id;
                        
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
                    if (isset($_GET['id'])) {
                        $id = htmlspecialchars($_GET['id']);

                        $tipo = $_POST['tipo'];

                        $sql = "UPDATE cat_produto SET tipo='{$tipo}' WHERE idCat_produto = ".$id;
                            
                        // Verifica se a conexão está estabelecida antes de executar a consulta
                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: cadastro_categoria.php");
                                exit();
                            } else {
                                echo "Erro ao editar os dados: " . $conn->error;
                            }
                        } else {
                            echo "Erro de conexão com o banco de dados.";
                        }
                    } else {
                        echo "O parâmetro 'id' não foi encontrado na URL.";
                    }
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
                    if (isset($_GET['id'])) {
                        $id = htmlspecialchars($_GET['id']);

                        $tipo = $_POST['tipo'];

                        $sql = "UPDATE forma_pagamento SET tipo='{$tipo}' WHERE idForma_pagamento = ".$id;
                            
                        // Verifica se a conexão está estabelecida antes de executar a consulta
                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: formaPagamento.php");
                                exit();
                            } else {
                                echo "Erro ao editar os dados: " . $conn->error;
                            }
                        } else {
                            echo "Erro de conexão com o banco de dados.";
                        }
                    } else {
                        echo "O parâmetro 'id' não foi encontrado na URL.";
                    }
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
                        $valor = $_POST['valor'];
                        $idCat_produto = $_POST['idCat_produto'];
                        $idPromocao = $_POST['idPromocao'];
                    
                        // Insere os dados no banco de dados
                        $sql = "INSERT INTO produto (nome, descricao, valor, idCat_produto, idPromocao) VALUES ('$nome','$descricao','$valor','$idCat_produto','$idPromocao')";
                        
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
                    $id = htmlspecialchars($_GET['id']);


                    $nome = $_POST['nome'];
                    $descricao = $_POST['descricao'];
                    $valor = $_POST['valor'];
                    $idCat_produto = $_POST['idCat_produto'];
                    $idPromocao = $_POST['idPromocao'];

                    $sql = "UPDATE produto SET nome='{$nome}', descricao='{$descricao}', valor='{$valor}', idCat_produto='{$idCat_produto}',idPromocao='{$idPromocao}' WHERE idProduto = ".$id;
                            

                    if ($conn) {
                        if ($conn->query($sql) === TRUE) {
                            header("Location: cadastro_produtos.php");
                            exit();
                        } else {
                            echo "Erro ao editar os dados: " . $conn->error;
                        }
                    } else {
                        echo "Erro de conexão com o banco de dados.";
                    }
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

        case 'compra_produtos':
            switch ($operacao) {
                case 'inserir':
                    // Verificar se o formulário foi submetido
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Recupera os dados do formulário
                        $dt_compra = date('Y-m-d', strtotime($_POST['dt_compra']));
                        $fornecedor_cnpj = $_POST['fornecedor_cnpj'];
                        $produtos = $_POST['produtos'];
                        $quantidades = $_POST['quantidades'];
                    
                        // Verifica se os arrays têm o mesmo tamanho
                        if (count($produtos) == count($quantidades)) {
                            // Formata os produtos e quantidades como uma string JSON válida
                            $produtosJson = [];
                            for ($i = 0; $i < count($produtos); $i++) {
                                $produtosJson[] = array('nome_produto' => $produtos[$i], 'qtde' => $quantidades[$i]);
                            }
                            $produtosJson = json_encode($produtosJson);
                            
                            // Insere os dados no banco de dados
                            $sql = "CALL teste('$dt_compra', '$fornecedor_cnpj', '$produtosJson');";
                            // Verifica se a conexão está estabelecida antes de executar a consulta
                            if ($conn) {
                                if ($conn->query($sql) === TRUE) {
                                    header("Location: compra_produto.php");
                                    exit();
                                } else {
                                    echo "Erro ao salvar os dados: " . $conn->error;
                                }
                            } else {
                                echo "Erro de conexão com o banco de dados.";
                            }
                        } else {
                            echo "Erro: quantidade de produtos e quantidades diferentes.";
                        }
                    }
                    break;

                case 'editar':
                    $id = htmlspecialchars($_GET['id']);
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Recupera os dados do formulário
                        $dt_compra = $_POST['dt_compra'];
                        $fornecedor_cnpj = $_POST['fornecedor_cnpj'];
                    
                        // Insere os dados no banco de dados
                        $sql = "UPDATE compra_produtos SET dt_compra='{$dt_compra}', fornecedor_cnpj='{$fornecedor_cnpj}' WHERE idCompra = ".$id;
                        
                        // Verifica se a conexão está estabelecida antes de executar a consulta
                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: compra_produto.php");
                                exit();
                            } else {
                                echo "Erro ao salvar os dados: " . $conn->error;
                            }
                        } else {
                            echo "Erro de conexão com o banco de dados.";
                        }
                    }
                    break;

                case 'excluir':
                    if (isset($_GET['id'])) {
                        $id = htmlspecialchars($_GET['id']);

                        $sql = "DELETE FROM compra_produtos WHERE idCompra =".$id;

                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: compra_produto.php");
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

        case 'item_compra':
            switch ($operacao) {
                case 'inserir':
                    // Verificar se o formulário foi submetido
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Recupera os dados do formulário
                        $qtde = $_POST['qtde'];
                        $nome_produto = $_POST['nome_produto'];
                        $compra_produtos_idCompra = $_POST['compra_produtos_idCompra'];
                    
                        // Insere os dados no banco de dados
                        $sql = "INSERT INTO item_compra (qtde, nome_produto, compra_produtos_idCompra) VALUES ('$qtde','$nome_produto','$compra_produtos_idCompra')";
                        
                        // Verifica se a conexão está estabelecida antes de executar a consulta
                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: item_compra.php");
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
                    $id = htmlspecialchars($_GET['id']);
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Recupera os dados do formulário
                        $qtde = $_POST['qtde'];
                        $nome_produto = $_POST['nome_produto'];
                        $compra_produtos_idCompra = $_POST['compra_produtos_idCompra'];
                    
                        // Insere os dados no banco de dados
                        $sql = "UPDATE item_compra SET qtde='{$qtde}', nome_produto='{$nome_produto}', compra_produtos_idCompra='{$compra_produtos_idCompra}' WHERE idItem = ".$id;
                        
                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: item_compra.php");
                                exit();
                            } else {
                                echo "Erro ao salvar os dados: " . $conn->error;
                            }
                        } else {
                            echo "Erro de conexão com o banco de dados.";
                        }
                    }
                    break;

                case 'excluir':
                    if (isset($_GET['id'])) {
                        $id = htmlspecialchars($_GET['id']);

                        $sql = "DELETE FROM item_compra WHERE idItem =".$id;

                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: item_compra.php");
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

        case 'tipo_entrega':
            switch ($operacao) {
                case 'inserir':
                    // Verificar se o formulário foi submetido
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Recupera os dados do formulário
                        $descricao = $_POST['descricao'];
                    
                        // Insere os dados no banco de dados
                        $sql = "INSERT INTO tipo_entrega (descricao) VALUES ('$descricao')";
                        
                        // Verifica se a conexão está estabelecida antes de executar a consulta
                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: tipo_entrega.php");
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
                    $id = htmlspecialchars($_GET['id']);

                    $descricao = $_POST['descricao'];

                    $sql = "UPDATE tipo_entrega SET descricao='{$descricao}' WHERE idTipo_entrega = ".$id;
                            

                    if ($conn) {
                        if ($conn->query($sql) === TRUE) {
                            header("Location: tipo_entrega.php");
                            exit();
                        } else {
                            echo "Erro ao editar os dados: " . $conn->error;
                        }
                    } else {
                        echo "Erro de conexão com o banco de dados.";
                    }
                    break;

                case 'excluir':
                    if (isset($_GET['id'])) {
                        $id = htmlspecialchars($_GET['id']);

                        $sql = "DELETE FROM tipo_entrega WHERE idTipo_entrega =".$id;

                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: tipo_entrega.php");
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
            
                    
        case 'venda':
        switch ($operacao) {
            case 'inserir':
                // Verificar se o formulário foi submetido
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Recupera os dados do formulário
                    $dt_venda = $_POST['dt_venda'];
                    $qtde = $_POST['qtde'];
                    $valortotal = $_POST['valorTotal'];
                    $cpffuncionario = $_POST['cpfFuncionario'];
                    $cliente = $_POST['cpfCliente'];
                    $iddesconto = $_POST['idDesconto'];
                    $idestoque = $_POST['Estoque_idEstoque'];

                    // Insere os dados no banco de dados
                    $sql = "INSERT INTO venda (dt_venda, qtde, valorTotal, cpfFuncionario, cpfCliente, idDesconto, Estoque_idEstoque) VALUES ('$dt_venda', '$qtde', '$valortotal', '$cpffuncionario', '$cliente', '$iddesconto', '$idestoque')";
                    
                    // Verifica se a conexão está estabelecida antes de executar a consulta
                    if ($conn) {
                        if ($conn->query($sql) === TRUE) {
                            header("Location: venda.php");
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

                    $sql = "DELETE FROM venda WHERE idVenda =".$id;

                    if ($conn) {
                        if ($conn->query($sql) === TRUE) {
                            header("Location: venda.php");
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

        case 'entrega':
            switch ($operacao) {
                case 'inserir':
                    // Verificar se o formulário foi submetido
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Recupera os dados do formulário
                        $idvenda = $_POST['idvenda'];
                        $idtipoentrega = $_POST['idtipoentrega'];
                    
                        // Insere os dados no banco de dados
                        $sql = "INSERT INTO entrega (idVenda, idTipo_Entrega) VALUES ('$idvenda', '$idtipoentrega')";
                        
                        // Verifica se a conexão está estabelecida antes de executar a consulta
                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: entrega.php");
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
                    $id = htmlspecialchars($_GET['id']);

                    $idvenda = $_POST['idVenda'];
                    $idtipoentrega = $_POST['idTipo_Entrega'];

                    $sql = "UPDATE entrega SET idVenda='{$idvenda}', idTipo_Entrega='{$idtipoentrega}'  WHERE idEntrega = ".$id;
                            

                    if ($conn) {
                        if ($conn->query($sql) === TRUE) {
                            header("Location: entrega.php");
                            exit();
                        } else {
                            echo "Erro ao editar os dados: " . $conn->error;
                        }
                    } else {
                        echo "Erro de conexão com o banco de dados.";
                    }
                    break;

                case 'excluir':
                    if (isset($_GET['id'])) {
                        $id = htmlspecialchars($_GET['id']);

                        $sql = "DELETE FROM entrega WHERE idEntrega =".$id;

                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: entrega.php");
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
        case 'pagamento':
            switch ($operacao) {
                case 'inserir':
                    // Verificar se o formulário foi submetido
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Recupera os dados do formulário
                        $idvenda = $_POST['idvenda'];
                        $idpagamento = $_POST['idpagamento'];
                    
                        // Insere os dados no banco de dados
                        $sql = "INSERT INTO pagamento (idVenda, idForma_pagamento) VALUES ('$idvenda', '$idpagamento')";
                        
                        // Verifica se a conexão está estabelecida antes de executar a consulta
                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: pagamento.php");
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

                        $sql = "DELETE FROM pagamento WHERE idPagamento =".$id;

                        if ($conn) {
                            if ($conn->query($sql) === TRUE) {
                                header("Location: pagamento.php");
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


}
$conn->close();

}
