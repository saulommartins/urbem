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
	 * @var string
	 */
	private $formato;

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
	 * @return bool
	 */
	public function getObrigatorio() : bool {
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
	protected function setConteudo(string $conteudo) {
		$this->conteudo = $conteudo;
	}

	/**
	 * @return string
	 */
	public function getFormato() : string
	{
		return $this->formato;
	}

	/**
	 * @param string $formato
	 */
	public function setFormato(string $formato)
	{
		$this->formato = $formato;
	}

	public function preparaConteudo() : void {
		$conteudo = $this->getValor();
		if (empty($conteudo)) {
			throw new Exception('Campo ' . $this->getNome() . ' é obrigatório!');
		}
		//TODO - manipulação do conteudo conforme tamanho e formato
        $conteudo = mb_substr($conteudo, 0, $this->getTamanho()[0] ?? strlen($conteudo));
		$this->setConteudo($conteudo);
	}

	/**
	 * Campo constructor.
	 */
	public function __construct() {

	}
}
