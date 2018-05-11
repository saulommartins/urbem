<?php

namespace Tests\Feature;

use App\Services\CampoTcePrAlfanumericoService;
use App\Services\CampoTcePrNumericoService;
use Mockery\Exception;
use Tests\TestCase;

/**
 * Class LinhaTcePrTest
 *
 * @package Tests\Feature
 */
class LinhaTcePrTest extends TestCase {

	/**
	 * @var \App\Services\LinhaService;
	 */
	private $service;

	function setUp()
	{
		parent::setUp();
		$this->service = \Illuminate\Support\Facades\App::make(\App\Services\LinhaService::class);
	}

	/**
	 * A basic test on Linha.
	 *
	 * @return void
	 */
	public function testLinha()
	{
		$colunaNumero = new CampoTcePrNumericoService();
		$colunaNumero->setObrigatorio(true);
		$colunaNumero->setFormato("999");
		$colunaNumero->setValor(10);

		$colunaTexto = new CampoTcePrAlfanumericoService();
		$colunaTexto->setObrigatorio(true);
		$colunaTexto->setFormato("Asadkjh ckjha oieurlkjcg");
		$colunaTexto->setTamanho([15]);
		$colunaTexto->setValor(10);
		$this->service->addCampo($colunaNumero);
		$this->service->addCampo($colunaTexto);
		$this->assertSame('010', $this->service->getConteudo(),"string");
	}

}
