<!doctype html>
<html lang="pt-BR">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  
    <link rel="stylesheet" href="CSS/formulario.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/style.css">

  </head>

  <body>
  
  <header>
      <ul class="nav nav-tabs custom-header" style="height:60px; align-items:center; background-color: rgb(49, 131, 218); font-size: 19px;"> 
        <li class="nav-item">
          <a class="nav-link text-light" aria-current="page" href="index.php">
            <img src="Image/001.png" alt="logo" width="45" height="45"></a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Pessoas</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="cadastro_cliente.php">Cadastro Cliente</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="endereco.php">Cadastro Endereço</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="cadastro_receita.php">Cadastro Receita</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="cadastro_funcionario.php">Cadastro Funcionário</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="cadastro_cargo.php">Cadastro Cargo</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Loja</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="cadastro_fornecedor.php">Cadastro Fornecedor</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="cadastro_produtos.php">Cadastro Produtos</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="cadastro_categoria.php">Cadastro Categoria</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="cadastro_promocao.php">Cadastro Promoção</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="estoque.php">Cadastro Estoque</a></li>
          </ul>
        </li>
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light"  data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Transações</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="compra_produto.php">Cadastro Compra Fornecedor</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="item_compra.php">Cadastro Item Compra</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="venda.php">Cadastro Venda</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="formaPagamento.php">Cadastro Forma de Pagamento</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light"  data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Financeiro</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="pagamento.php">Pagamento</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="desconto.php">Cadastro Desconto</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="nota_fiscal.php">Cadastro Nota Fiscal</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light"  data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Entrega</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="entrega.php">Cadastro Entrega</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="tipo_entrega.php">Cadastro Tipo Entrega </a></li>
          </ul>
        </li>

      </ul>
    </div> 
    </header>

    <main>
    <div class="container-fluid mt-4" id="tabela">
      <div class="container ">
        <div class="fundoTabela">
          <h2 class="titulo1">Clientes</h2>
          <table class="table table-striped w-75 mx-auto">
            <thead>
              <tr>
                <th scope="col-3">nome</th>
                <th scope="col-3">Cpf</th>
                <th scope="col-3">Rg</th>
                <th scope="col-3">Telefone</th>
                <th scope="col-3">Email</th>


                <th scope="col-1" style="width: 200px;">Ações</th>
              </tr>
            </thead>

            <tbody class="table-group-divider">
              <?php
                include ("config.php");
              $sql = "select * from cliente";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                foreach ($result as $row) {
                  echo "<tr>";
                  echo "<td>" . $row["nome"] . "</td>";
                  echo "<td>" . $row["cpf"] . "</td>";
                  echo "<td>" . $row["rg"] . "</td>";
                  echo "<td>" . $row["telefone"] . "</td>";
                  echo "<td>" . $row["email"] . "</td>";

                  echo "<td>
                  <button type='button' class='btn btn-primary' onclick=\"location.href='editar_cliente.php?id=".$row['cpf']."'\" id='editar' >Editar</button>
                    <button onclick=\"location.href='CadastroBanco.php?operacao=excluir&tabela=cliente&id=".$row['cpf']."'\" type='button' class='btn btn-danger' id='excluir'>Excluir</button>  
                  </td>";

                  echo "</tr>";
            
                }
                
              } else {
                echo "0 resultados";
                }
                $conn->close();
              ?>
            </tbody>
          </table>
          <div class="d-flex justify-content-center align-items-center">
            <button type="button" class="btn btn-primary mt-1 mb-2 col-md-6" id="cadastrar">Cadastrar Cliente</button>
          </div>  
        </div>
      </div>
    </div>


    <div class="container-fluid" style="display:none" id="cadastro">
        <div class="formulario">
            <div class="formularioDados">
                <h2 class="titulo">Dados do Cliente</h2>
                <form class="row g-3" action="CadastroBanco.php?operacao=inserir&tabela=cliente" method="post">
                    <div class="col-md-4">
                        <label for="nome" class="form-label">Nome do Cliente</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                
                    <div class="col-md-4">
                        <label for="cpf" class="form-label">Inserir cpf</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" required>
                    </div>

                    <div class="col-md-4">
                        <label for="rg" class="form-label">Inserir rg</label>
                        <input type="number" class="form-control" id="rg" name="rg" required>
                    </div>
                   
                    <div class="col-md-4">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="number" class="form-control" id="telefone" name="telefone" required>
                    </div>

                    <div class="col-md-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    
                    <div class="row"> 
                        <div class="col-md-6">
                            <button class="btn btn-primary mt-3 mb-2 col-md-12" type="submit">Cadastrar</button>   
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-danger mt-3 mb-2 col-md-12" id="cancelar" type="button">Cancelar</button>
                        </div>
                    </div>                
                </form>
            </div>
        </div>
    </div>



    
    
    </main>
    <footer class="footer">
      <p class="pt-3">powerby: RAFAEL, LARISSA e EMILIA</p>
    </footer>

  
    <!-- Bootstrap JavaScript Libraries -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
    <script src="js/main.js"></script>

  </body>
</html>
