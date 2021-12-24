# PHP_Tutoriais

<strong>PHP com MySQL</strong><br>
Primeira parte do estudo usa a função SUM() do MySQL para somar valores diretamente no banco de dados.

Exemplo:
 $query_valor_venda = "SELECT SUM(quantidade * preco_venda) AS valor_estoque_venda FROM produtos";
 
A segunda parte do estuda é criado um combobox com uso de HTML. O combobox é preenchido automaticamente através de busca no banco de dados.
Abaixo foi criada uma DIV e esta de acordo com o campo selecionado no combox box mostra os campos nome,quantidade e valor de venda com seus respectivos valores armazenados no banco de dados. 
