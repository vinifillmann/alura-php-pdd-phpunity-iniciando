<?php

require "vendor/autoload.php";

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;

// Arrumo a casa para teste

$leilao = new Leilao("Camaro");

$maria = new Usuario("Maria");
$jorge = new Usuario("Jorge");
$joao = new Usuario("Joao");

$leilao->recebeLance(new Lance($maria, 25000));
$leilao->recebeLance(new Lance($jorge, 27000));
$leilao->recebeLance(new Lance($joao, 40000));

$leiloeiro = new Avaliador();

// executo o teste

$leiloeiro->avalia($leilao);
$maiorValor = $leiloeiro->getMaiorValor();

// verificar resultado do teste

$valorEsperado = 40000;

if ($maiorValor == $valorEsperado) {
    echo "TESTE OK";
} else {
    echo "TESTE FALHOU";
}