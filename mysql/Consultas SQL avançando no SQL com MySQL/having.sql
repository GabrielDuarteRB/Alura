select cpf, count(*) as contador from notas_fiscais 
WHERE YEAR(DATA_VENDA) = 2016
group by cpf 
having contador > 2000;