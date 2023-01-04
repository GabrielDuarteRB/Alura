<?php 

class Conta
{
    public string $cpfTitular;
    public string $nomeRTitular;
    public float $saldo = 0;

    public function sacar(float $valorASacar) : void
    {
        if($valorASacar > $this->saldo) {
            echo "Saldo indisponivel";
            return;
        }
        
        $this->saldo -= $valorASacar;
    }

    public function depositar(float $valorADepositar) : void
    {
        if($valorADepositar < 0) {
            echo "Valor precisa ser positivo";
            return;
        }
    
        $this->saldo += $valorADepositar;
    }

    public function transferir(float $valorATransferir, conta $contaDestino) : void
    {
        if($valorATransferir > $this->saldo) {
            echo "Saldo indisponível";
            return;
        }
        
        $this->sacar($valorATransferir);
        $contaDestino->depositar($valorATransferir);
    }
}