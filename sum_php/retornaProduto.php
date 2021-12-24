<?php
    //header('Content-Type: application/json');

    include_once "conexao.php";
   
    $id = $_POST['id'];    
    
    
    //percorrendo banco  
   $rs= $conn->query("SELECT * FROM produtos WHERE id=" . $id);
        $row_produto= $rs->fetch(PDO::FETCH_OBJ);
        $nome = $row_produto->nome;
        $quantidade = $row_produto->quantidade;
        $valorVenda = $row_produto->preco_venda;

       $produto['nome'] =  $nome ;
       $produto['quantidade'] =  $quantidade;
       $produto['valorVenda'] = $valorVenda;

       echo json_encode($produto);
        /*echo "nome: $obj$nome . "<br>"; 
        echo "quantidade: " . $quantidade . "<br>"; 
        echo "valorVenda: " . $valorVenda . "<br>";
        */ 


?>