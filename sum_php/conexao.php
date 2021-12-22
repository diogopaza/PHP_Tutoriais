<?php
    try{
        $conn = new PDO('mysql:host=localhost;dbname=celke', "root", "password");
        //echo "Conexão realizada com sucesso";
       
    }catch(PDOException $e){
        echo "Erro ao conectar com MySQL: " . $e->getMessage();
    }
    /*
    $sql = "SELECT * FROM produtos";
    $result = $conn->query($sql);
    $rows = $result->fetchAll();

    print_r($rows);
    */
?>