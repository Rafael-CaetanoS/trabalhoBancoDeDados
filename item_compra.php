<!doctype html>
<html lang="pt-BR">
  <head>
    <title>FharmaViva</title>
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
          <h2 class="titulo1">Dados do Item da Compra</h2>
          <table class="table table-striped w-75 mx-auto">
            <thead>
              <tr>
                <th scope="col-3">Id</th>
                <th scope="col-3">Nome</th>
                <th scope="col-3">Quantidade</th>
                <th scope="col-3">Id da Compra</th>
                <th scope="col-1" style="width: 200px;">Ações</th>
              </tr>
            </thead>

            <tbody class="table-group-divider">
              <?php
                include ("config.php");
              $sql = "select * from item_compra";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                foreach ($result as $row) {
                  echo "<tr>";
                  echo "<td>" . $row["idItem"] . "</td>";
                  echo "<td>" . $row["nome_produto"] . "</td>";
                  echo "<td>" . $row["qtde"] . "</td>";
                  echo "<td>" . $row["Compra_produtos_idCompra"] . "</td>";
                  echo "<td>
                    <button type='button' class='btn btn-primary' onclick=\"location.href='editar_item_compra.php?id=".$row['idItem']."'\" id='editar' >Editar</button>
                    <button onclick=\"location.href='CadastroBanco.php?operacao=excluir&tabela=item_compra&id=".$row['idItem']."'\" type='button' class='btn btn-danger' id='excluir'>Excluir</button>  
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
            <button type="button" class="btn btn-primary mt-1 mb-2 col-md-6" id="cadastrar">Cadastrar Item</button>
          </div>  
        </div>
      </div>
    </div>


    <div class="container-fluid" style="display:none" id="cadastro">
        <div class="formulario">
            <div class="formularioDados">
                <h2 class="titulo">Dados do Item</h2>
                <form class="row g-3" action="CadastroBanco.php?operacao=inserir&tabela=item_compra" method="post">
                    <div class="col-md-4">
                        <label for="nome_produto" class="form-label">Nome do produto</label>
                        <input type="text" class="form-control" id="nome_produto" name="nome_produto" required>
                    </div>
                    <div class="col-md-4">
                        <label for="qtde" class="form-label">Quantidade</label>
                        <input type="number" class="form-control" id="qtde" name="qtde" required>
                    </div>
                    <div class="col-md-4">
                    <label for="compra_produtos_idCompra" class="form-label">Id da compra</label>
                        <select class="form-select" id="compra_produtos_idCompra" name="compra_produtos_idCompra" required>
                            <option value="" selected disabled>Selecione</option>
                            <?php
                            include ("config.php");
                            $sql = "SELECT * FROM compra_produtos";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["idCompra"] . '">' . $row["idCompra"] . '</option>';
                                }
                            } else {
                                echo '<option value="">Nenhum id disponível</option>';
                            }
                            $conn->close();
                            ?>
                        </select>
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
