select NOME_DO_PRODUTO, PRECO_DE_LISTA,
case 
	when preco_de_lista >= 12 then 'Produto caro'
    when preco_de_lista >= 7 and preco_de_lista < 12 then 'Produto em conta'
    else 'Produto Barato'
end as STATUS_PRECO
from tabela_de_produtos;

select NOME,
case
	when year(DATA_DE_NASCIMENTO) < 1990 then 'Velhos'
    when year(DATA_DE_NASCIMENTO) >= 1990 and year(DATA_DE_NASCIMENTO) <= 1995 then 'Jovens'
    else 'Crianças'
end as Classificação
from tabela_de_clientes;