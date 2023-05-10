select * from tabela_de_vendedores;
select * from notas_fiscais;

select * from tabela_de_vendedores A
inner join notas_fiscais B
on A.matricula = B.matricula;

select A.Matricula, A.nome, COUNT(*) 
from tabela_de_vendedores A
inner join notas_fiscais B
on A.matricula = B.matricula
group by A.MATRICULA, A.Nome;

select * from notas_fiscais;
select * from itens_notas_fiscais;

select year(data_venda), SUM(quantidade * preco) as faturamento 
from notas_fiscais NF
inner join itens_notas_fiscais INF
on NF.numero = INF.numero
group by Year(data_venda);
