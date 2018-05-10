<?php

namespace Tests\Feature;

use Mockery\Exception;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CampoTest extends TestCase
{

	/**
	 * @var \App\Services\CampoService;
	 */
	private $service;

	function setUp()
	{
		parent::setUp();
		$this->service = \Illuminate\Support\Facades\App::make(\App\Services\CampoService::class);
		$this->service->setNome("Identificador Pessoa Juridica");
	}

	/**
     * A basic test on Campo.
     *
     * @return void
     */
    public function testCampoObrigatorio()
    {
	    $this->service->setObrigatorio(true);
	    $this->service->setValor(0);
        $this->expectException(Exception::class);
	    $this->assertTrue($this->service->getObrigatorio());
	    $this->service->getConteudo();
    }

    public function testCampoConteudo()
    {
    	$this->service->setObrigatorio(true);
    	$this->service->setValor('123');
    	$this->assertTrue($this->service->getValor() == '123');
    }

	public function testPreparaConteudo()
	{
		$valor = '123';
		$this->service->setValor($valor);
		$this->assertTrue($this->service->getValor() == $valor);
	}


	public function testSetTamanho()
	{
		$this->service->setTamanho([5]);
		$this->service->setValor("123456");
		$this->assertTrue(strlen($this->service->getConteudo()) == $this->service->getTamanho()[0]);
	}
}
