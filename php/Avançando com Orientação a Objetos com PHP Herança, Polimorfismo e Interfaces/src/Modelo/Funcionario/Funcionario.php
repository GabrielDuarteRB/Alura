<?php

namespace Alura\Banco\Modelo\Funcionario;

use Alura\Banco\Modelo\{Pessoa, CPF};

abstract class Funcionario extends Pessoa
{
    private float $salario;
    
    public function __construct(string $nome, CPF $cpf, float $salario)
    {
        parent::__construct($nome, $cpf);
        $this->salario = $salario;
    }

    public function recuperaSalario() : float
    {
        return $this->salario;
    }

    protected function alteraNome(string $nome) : void
    {
        $this->validaNomeTitular($nome);
        $this->nome = $nome;
    }

    public function recebeAumento(float $valorAumento) : void
    {
        if($valorAumento < 0) {
            echo "Valor tem que ser positivo";
            return;
        }

        $this->salario = $valorAumento;
    }

    abstract public function calculaBonificacao() : float;
}