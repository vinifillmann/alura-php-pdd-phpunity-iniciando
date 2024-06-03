<?php

namespace Alura\Leilao\Service;

use Alura\Leilao\Model\Leilao;

class Avaliador
{
    private float $maiorValor = -INF;

    private float $menorValor = INF;

    public function avalia(Leilao $leilao): void
    {
        foreach ($leilao->getLances() as $lance) {
            if (($valorDoLance = $lance->getValor()) > $this->maiorValor) {
                $this->maiorValor = $valorDoLance;
            }
            if ($valorDoLance < $this->menorValor) {
                $this->menorValor = $valorDoLance;
            }
        }
    }

    public function getMaiorValor(): float
    {
        return $this->maiorValor;
    }

    public function getMenorValor(): float
    {
        return $this->menorValor;
    }
}