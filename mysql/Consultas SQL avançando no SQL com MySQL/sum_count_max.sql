select estado, sum(limite_de_credito) as limite_total from tabela_de_clientes group by estado;

select embalagem, preco_de_lista from tabela_de_produtos;

select embalagem, max(preco_de_lista) as maior_preco from tabela_de_produtos group by embalagem;

select embalagem, count(*) as contador from tabela_de_produtos group by embalagem;
