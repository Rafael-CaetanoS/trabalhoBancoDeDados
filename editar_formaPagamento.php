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
    <?php
        include ("config.php");
        $id = htmlspecialchars($_GET['id']);
        $sql = "SELECT * FROM forma_pagamento WHERE idForma_pagamento =" .$id ;
        $result = $conn->query($sql);
        $row = $result->fetch_object();
    ?>

    <div class="container-fluid" id="editar">
        <div class="formulario">
            <div class="formularioDados">
                <h2 class="titulo">Editar Forma Pagamento</h2>
                <form class="row g-3" action="CadastroBanco.php?operacao=editar&tabela=forma_pagamento&id=<?php echo $id; ?>" method="post">
                    <div class="col-md-4">
                        <label for="tipo" class="form-label">Tipo</label>
                        <input type="text" class="form-control" id="tipo" name="tipo" value ="<?php print $row->tipo; ?>">
                    </div>

                    <div class="row"> 
                        <div class="col-md-6">
                            <button class="btn btn-primary mt-3 mb-2 col-md-12" type="submit">Cadastrar</button>   
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-danger mt-3 mb-2 col-md-12" onclick="location.href='endereco.php?'" type="button">Cancelar</button>
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
