select * from tabela_de_produtos order by PRECO_DE_LISTA;

select * from tabela_de_produtos order by PRECO_DE_LISTA desc;

select * from itens_notas_fiscais 
where CODIGO_DO_PRODUTO = (
	select distinct CODIGO_DO_PRODUTO from tabela_de_produtos where NOME_DO_PRODUTO = 'Linha Refrescante - 1 Litro - Morango/Limão'
)
order by QUANTIDADE desc;