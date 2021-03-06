<?php

namespace Tests\Feature;

use Mockery\Exception;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CampoTcePrAlfanumericoTest extends TestCase
{
	/**
	 * @var \App\Services\CampoTcePrDataService;
	 */
	private $service;

	function setUp()
	{
		parent::setUp();
		$this->service = \Illuminate\Support\Facades\App::make(\App\Services\CampoTcePrAlfanumericoService::class);
		$this->service->setNome("Nome da Pessoa");
	}

	/**
	 * A basic test on CampoTcePrAlfanumerico.
	 *
	 * @return void
	 */
	public function testCampoObrigatorio()
	{
        $this->expectException(Exception::class);
		$this->service->setObrigatorio(true);
		$this->service->setValor('');
		$this->service->getConteudo();
		$this->expectException("Nome da Pessoa é obrigatório!");
	}

	/**
	 * A basic test on CampoTcePrData.
	 *
	 * @return void
	 */
	public function testCampoAlphanumericoOk()
	{
		$this->service->setTamanho([10]);
		$this->service->setValor("Jõao da Silva");
        $this->assertSame('Jõao da Si', $this->service->getConteudo(),"string");
	}
}
