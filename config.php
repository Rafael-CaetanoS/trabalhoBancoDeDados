<?php
   $servername = "localhost"; // Hostname do servidor MySQL (geralmente localhost)
   $username = "root"; // Nome de usuário do MySQL (padrão é root)
   $password = "Jesus100"; // Senha do MySQL (por padrão, está vazia)
   $database = "farmacia"; // Nome do banco de dados que você deseja se conectar
   
   // Criando uma conexão com o banco de dados
   $conn = new mysqli($servername, $username, $password, $database);
   
   // Verificando a conexão
   if ($conn->connect_error) {
       die("Erro na conexão: " . $conn->connect_error);
   }
   // Fechando a conexão 

