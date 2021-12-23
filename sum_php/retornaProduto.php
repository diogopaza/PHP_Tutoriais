<?php

    include_once "conexao.php";

   // $id = $_POST['id'];    
    //echo "<select id='selecao_produtos' onchange='alterarProduto()'>";
    //percorrendo banco
   
   $rs= $conn->query("SELECT * FROM produtos WHERE id=10");
        $row_produto= $rs->fetch(PDO::FETCH_OBJ);
        $nome = $row_produto->nome;
        $quantidade = $row_produto->quantidade;
        $valorVenda = $row_produto->preco_venda;

       $produto['nome'] = 'televisao';
       $produto['quantidade'] = '2';
       $produto['valorVenda'] = '20';

       echo json_encode($produto);
        /*echo "nome: $obj$nome . "<br>"; 
        echo "quantidade: " . $quantidade . "<br>"; 
        echo "valorVenda: " . $valorVenda . "<br>";*/ 


?>