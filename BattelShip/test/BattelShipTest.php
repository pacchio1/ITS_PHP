<?php
declare(strict_types=1);

namespace App\Test;

use PHPUnit\Framework\TestCase;
use BattelShipPacchiotti\BattelShipPacchiotti;

class FilterTest extends TestCase
{
    public function testAttaccaColpito()
    {
        $battelShip = new BattelShipPacchiotti();
        $tabella=array(
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'X', 'X', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O')
        );
        $tabella_aspettata=array(
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'X', 'H', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O')
        );

        $this->assertEquals([$tabella_aspettata,"Colpito!"],$battelShip->attacca(3,3,$tabella),"");
    }

    public function testAttaccaMancato()
    {
        $battelShip = new BattelShipPacchiotti();
        $tabella=array(
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'X', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O')
        );
        $tabella_aspettata=array(
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'X', 'M', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O')
        );
        $this->assertEquals([$tabella_aspettata,"Mancato!"],$battelShip->attacca(3,3,$tabella),"");
    }
}
