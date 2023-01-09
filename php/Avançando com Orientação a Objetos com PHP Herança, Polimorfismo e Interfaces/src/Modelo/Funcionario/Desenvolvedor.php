<?php

namespace Alura\Banco\Modelo\Funcionario;

class Desenvolvedor extends Funcionario
{
    public function sobeDeNivel() : float
    {
        return $this->recuperaSalario($this->recuperaSalario() * 0.75);
    }

    public function calculaBonificacao() : float
    {
        return 500.00;
    }

}