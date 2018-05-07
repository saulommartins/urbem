<?php

namespace Tests\Feature;

use Mockery\Exception;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CampoTcePrNumericoTest extends TestCase
{

	/**
	 * @var \App\Services\CampoTcePrNumericoService;
	 */
	private $service;

	function setUp()
	{
		parent::setUp();
		$this->service = \Illuminate\Support\Facades\App::make(\App\Services\CampoTcePrNumericoService::class);
		$this->service->setNome("Tipo de Série Documento Fiscal");
	}

	/**
	 * A basic test on CampoTcePrNumerico.
	 *
	 * @return void
	 */
	public function testCampoObrigatorio()
	{
		$this->service->setObrigatorio(true);
		$this->service->setValor("");
        $this->expectException(Exception::class);
        $this->assertTrue($this->service->getObrigatorio());
        $this->service->getConteudo();
	}

	/**
	 * A basic test on CampoTcePrNumerico.
	 *
	 * @return void
	 */
	public function testCampoObrigatorioParcialNok()
	{
		$this->service->setObrigatorio(false);
		$this->service->setFormato("099");
		$this->service->setValor(5);
		$this->assertSame('05', $this->service->getConteudo(),"string");
	}
//
//	/**
//	 * A basic test on CampoTcePrNumerico.
//	 *
//	 * @return void
//	 */
//	public function testCampoParcialOk()
//	{
//		$this->service->setObrigatorio(true);
//		$this->service->setFormato("099");
//		$this->service->setValor(55);
//		$this->assertTrue($this->service->getConteudo() == 55);
//	}
//
//
//	/**
//	 * A basic test on CampoTcePrNumerico.
//	 *
//	 * @return void
//	 */
//	public function testCampoMoedaZero()
//	{
//		$this->service->setObrigatorio(true);
//		$this->service->setFormato("9.99");
//		$this->service->setValor(0);
//		$this->assertTrue($this->service->getConteudo() == 0.00);
//	}
//
//	/**
//	 * A basic test on CampoTcePrNumerico.
//	 *
//	 * @return void
//	 */
//	public function testCampoMoedaMaiorZero()
//	{
//		$this->service->setFormato("9.99");
//		$this->service->setValor(10);
//		$this->assertTrue($this->service->getConteudo() == 10.00);
//	}
//
//	/**
//	 * A basic test on CampoTcePrNumerico.
//	 *
//	 * @return void
//	 */
//	public function testCampoOPercentual()
//	{
//		$this->service->setFormato("9.999");
//		$this->service->setValor(10);
//		$this->assertTrue($this->service->getConteudo() == 10.000);
//	}
//
//	/**
//	 * A basic test on CampoTcePrNumerico.
//	 *
//	 * @return void
//	 */
//	public function testCampoNumericoNok()
//	{
//		$this->service->setValor("ABC");
//		$this->expectException("Tipo de Série Documento Fiscal é inválido!");
//	}
//
//

}
