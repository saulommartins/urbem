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

//	function setUp()
//	{
//		parent::setUp();
//		$this->service = \Illuminate\Support\Facades\App::make
//		(\App\Services\CampoTcePrDataService::class);
//		$this->service->setNome("Data da Operação");
//	}
//
//	/**
//	 * A basic test on CampoTcePrData.
//	 *
//	 * @return void
//	 */
//	public function testCampoObrigatorio()
//	{
//		$this->service->setObritarorio(true);
//		$this->service->setValor(null);
//		$this->getConteudo();
//		$this->expectException("Data da Operação é obrigatório!");
//	}
//
//
//	/**
//	 * A basic test on CampoTcePrData.
//	 *
//	 * @return void
//	 */
//	public function testCampoObrigatorioParcialNok()
//	{
//		$this->service->setObrigatorio(false);
//		$this->service->setFormato("AAAA-MM-DD");
//		$this->service->setValor("5/10/2017");
//		$this->assertTrue($this->service->getConteudo() == "2017-10-05");
//	}
}
