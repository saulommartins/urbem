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
		$this->expectException(\TypeError::class);
		$this->service->setValor(null);
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
		$this->assertSame('005', $this->service->getConteudo(),"string");
	}

	/**
	 * A basic test on CampoTcePrNumerico.
	 *
	 * @return void
	 */
	public function testCampoParcialOk()
	{
		$this->service->setObrigatorio(true);
		$this->service->setFormato("099");
		$this->service->setValor(55);
		$this->assertSame('055', $this->service->getConteudo(),"string");
	}


	/**
	 * A basic test on CampoTcePrNumerico.
	 *
	 * @return void
	 */
	public function testCampoApenasZero()
	{
		$this->service->setObrigatorio(true);
		$this->service->setFormato("999");
		$this->service->setValor("0");
		$this->assertSame('000', $this->service->getConteudo(),"string");
	}
}
