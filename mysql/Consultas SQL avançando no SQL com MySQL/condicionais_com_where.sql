select * from tabela_de_produtos where SABOR = 'Manga' and not(tamanho = '470 ml');

select * from tabela_de_produtos where sabor in ('Laranja', 'Manga');

select * from tabela_de_clientes where cidade in ('Rio de Janeiro', 'São Paulo') and (idade >= 20 and idade <= 22);