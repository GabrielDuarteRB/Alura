<?php

namespace Alura\Banco\Service;

use Alura\Banco\Modelo\Funcionario\Funcionario;

class ControladorDeBonificacoes
{
    private $totalBonificacoes = 0;

    public function adicionaBonificacaoDe(Funcionario $funcionario) : void
    {
        $this->totalBonificacoes += $funcionario->calculaBonificacao();
    }

    public function recuperaBonificacoes() : float
    {
        return $this->totalBonificacoes;
    }
}