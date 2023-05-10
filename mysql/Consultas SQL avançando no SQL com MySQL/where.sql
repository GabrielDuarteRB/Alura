use sucos_vendas;

select	* from tabela_de_produtos where codigo_do_produto = '1000889';

select	* from tabela_de_produtos where sabor = 'Laranja' or  codigo_do_produto = '1000889';

select * from tabela_de_produtos where preco_de_lista between 19.50 and 19.52;