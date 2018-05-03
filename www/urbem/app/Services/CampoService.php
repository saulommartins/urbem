<?php

namespace App\Services;

use Mockery\Exception;

/**
 * Class CampoService
 */
class CampoService {

	/**
	 * @var string
	 */
	private $nome;
	/**
	 * @var bool
	 */
	private $obrigatorio;
	/**
	 * @var string
	 */
	private $valor;
	/**
	 * @var array
	 */
	private $tamanho;

	/**
	 * @var string
	 */
	private $conteudo;

	/**
	 * @return string
	 */
	public function getNome(): string {
		return $this->nome;
	}

	/**
	 * @param string $nome
	 */
	public function setNome(string $nome) {
		$this->nome = $nome;
	}

	/**
	 * @return string
	 */
	public function getObrigatorio() {
		return $this->obrigatorio;
	}

	/**
	 * @param bool $obrigatorio
	 */
	public function setObrigatorio(bool $obrigatorio) {
		$this->obrigatorio = $obrigatorio;
	}

	/**
	 * @return string
	 */
	public function getValor(): string {
		return $this->valor;
	}

	/**
	 * @param string $valor
	 */
	public function setValor(string $valor) {
		$this->valor = $valor;
	}

	/**
	 * @return array
	 */
	public function getTamanho(): array {
		return $this->tamanho;
	}

	/**
	 * @param array $tamanho
	 */
	public function setTamanho(array $tamanho) {
		$this->tamanho = $tamanho;
	}

	/**
	 * @return string
	 */
	public function getConteudo(): string {
		$this->preparaConteudo();
		return $this->conteudo;
	}

	/**
	 * @param string $conteudo
	 */
	private function setConteudo(string $conteudo) {
		$this->conteudo = $conteudo;
	}

	public function preparaConteudo() {
		$conteudo = $this->getValor();
		if ($conteudo == '') {
			throw new Exception('Campo ' . $this->getNome() . ' é obrigatório!');
		}
		//TODO - manipulação do conteudo conforme tamanho e formato
		$this->setConteudo($conteudo);
	}

	/**
	 * Campo constructor.
	 */
	public function __construct() {

	}
}
