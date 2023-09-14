<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class BuscaCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function buscarResultadosNaPaginaTest(AcceptanceTester $I)
    {
		$I->amOnPage('/eventando_web/menu.php');
	    	$I->click('btn');
		$I->click('PERFIL');
		$I->seeCurrentURLEquals('/eventando_web/perfil.php');
		$I->see('Data de nascimento');
    }
}
