<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CampoTcePrDataTest extends TestCase
{
	/**
	 * @var \App\Services\CampoTcePrDataService;
	 */
	private $service;

	function setUp()
	{
		parent::setUp();
		$this->service = \Illuminate\Support\Facades\App::make
		(\App\Services\CampoTcePrDataService::class);
		$this->service->setNome("Data da Operação");
	}

	/**
	 * A basic test on CampoTcePrData.
	 *
	 * @return void
	 */
	public function testCampoObrigatorio()
	{
		$this->service->setObrigatorio(true);
		$this->expectException(\TypeError::class);
		$this->service->setValor(null);
		$this->service->getConteudo();
	}

	/**
	 * A basic test on CampoTcePrData.
	 *
	 * @return void
	 */
	public function testCampoObrigatorioParcialNok()
	{
		$this->service->setObrigatorio(false);
		$this->service->setFormato("AAAA-MM-DD");
		$this->service->setData(5,10,2017);
		$this->assertEquals($this->service->getConteudo(),"2017-10-05");
	}

	/**
	 * A basic test on CampoTcePrData.
	 *
	 * @return void
	 */
	public function testCampoDataFormato()
	{
		$this->service->setObrigatorio(false);
		$this->service->setFormato("DD-MM-AAAA");
		$this->service->setData(5,10,2017);
		$this->assertEquals($this->service->getConteudo(),"05-10-2017");
	}
}
