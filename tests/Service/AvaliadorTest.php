<?php

namespace Alura\Leilao\Tests\Service;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;
use PHPUnit\Framework\TestCase;

class AvaliadorTest extends TestCase
{
    public function testAvaliadorDeveEncontrarOMaiorValorDeFormaCrescente()
    {
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

        self::assertEquals(40000, $maiorValor);
    }

    public function testAvaliadorDeveEncontrarOMaiorValorDeFormaDerescente()
    {
        $leilao = new Leilao("Camaro");

        $maria = new Usuario("Maria");
        $jorge = new Usuario("Jorge");
        $joao = new Usuario("Joao");

        $leilao->recebeLance(new Lance($joao, 40000));
        $leilao->recebeLance(new Lance($jorge, 27000));
        $leilao->recebeLance(new Lance($maria, 25000));

        $leiloeiro = new Avaliador();

        // executo o teste

        $leiloeiro->avalia($leilao);
        $maiorValor = $leiloeiro->getMaiorValor();

        // verificar resultado do teste

        self::assertEquals(40000, $maiorValor);
    }

    public function testAvaliadorDeveEncontrarOMenorValorDeFormaCrescente()
    {
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
        $menorValor = $leiloeiro->getMenorValor();

        // verificar resultado do teste

        self::assertEquals(25000, $menorValor);
    }

    public function testAvaliadorDeveEncontrarOMenorValorDeFormaDecrescente()
    {
        $leilao = new Leilao("Camaro");

        $maria = new Usuario("Maria");
        $jorge = new Usuario("Jorge");
        $joao = new Usuario("Joao");

        $leilao->recebeLance(new Lance($joao, 40000));
        $leilao->recebeLance(new Lance($jorge, 27000));
        $leilao->recebeLance(new Lance($maria, 25000));

        $leiloeiro = new Avaliador();

        // executo o teste

        $leiloeiro->avalia($leilao);
        $menorValor = $leiloeiro->getMenorValor();

        // verificar resultado do teste

        self::assertEquals(25000, $menorValor);
    }
}
