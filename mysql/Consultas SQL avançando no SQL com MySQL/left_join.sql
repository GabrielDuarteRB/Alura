select count(*) from tabela_de_clientes;

select cpf, count(*) from notas_fiscais group by cpf;

select distinct A.cpf, A.nome, B.cpf 
from tabela_de_clientes A
left join notas_fiscais B
on A.cpf = B.cpf
where B.cpf is null and Year(B.data_venda) = 2016;