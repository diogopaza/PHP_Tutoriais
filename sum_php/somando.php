<?php
   include_once "conexao.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
   
    
        $query_valor_venda = "SELECT SUM(quantidade * preco_venda) AS valor_estoque_venda FROM produtos";
        $result = $conn->prepare($query_valor_venda);
        $result -> execute();

        $row_valor_venda = $result->fetch(PDO::FETCH_ASSOC);
        echo "Valor do estoque (venda) ". number_format($row_valor_venda['valor_estoque_venda'], 2, ",", ".");        
        echo "<br><br>";

        $query_valor_compra = "SELECT SUM(quantidade * preco_compra) AS valor_estoque_compra FROM produtos";
        $result = $conn->prepare($query_valor_compra);
        $result -> execute();

        $row_valor_compra = $result->fetch(PDO::FETCH_ASSOC);
        echo "Valor do estoque (compra) ". number_format($row_valor_compra['valor_estoque_compra'], 2, ",", ".");        
        echo "<br><br>";

        $lucro = $row_valor_venda['valor_estoque_venda'] - $row_valor_compra['valor_estoque_compra'];
        echo "Lucro: " . number_format($lucro,2,",","." );
        echo "<hr>";

        
            echo "<select id='combo_produtos' onchange='alterarProduto()'>";
                 //percorrendo banco
                $rs= $conn->query("SELECT * FROM produtos");
                while($row_produtos= $rs->fetch(PDO::FETCH_OBJ)){
                    echo "<option value=" . $row_produtos->id . ">".$row_produtos->nome."</option>";           
                }                    
            echo "</select>";
            echo "<br><br>";

       echo "<div id='mostra_produtos'>";
               echo "<label id='labelNome'>Nome: </label><br>";
               echo "<label id='labelQuantidade'>Quantidade:  </label><br>";
               echo "<label id='labelValorVenda'>Valor de Venda:  </label><br>";
       echo "</div>";


    ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fetch/2.0.3/fetch.js"></script>
<script src="//cdn.jsdelivr.net/bluebird/3.5.0/bluebird.min.js"></script>
<script>
    function alterarProduto() {       
        
        comboBox = document.getElementById("combo_produtos");
        var id = comboBox.options[comboBox.selectedIndex].value;
        var formData = new FormData();
        formData.append('id', id);
     
fetch("http://localhost/PHP_Tutoriais/sum_php/retornaProduto.php",
{ method: 'POST',
  body: formData,  
})
.then(function (response) {
  return response.text();
})
.then(function (body) {
 console.log(body);
 
  const obj = JSON.parse(body);
  labelNome = document.getElementById('labelNome').innerHTML = "Nome: " + obj.nome;
  labelNome = document.getElementById('labelQuantidade').innerHTML = "Quantidade: " + obj.quantidade;
  labelNome = document.getElementById('labelValorVenda').innerHTML = "Valor de Venda: " + obj.valorVenda;
 
});
    }
    


</script>
</body>

</html>