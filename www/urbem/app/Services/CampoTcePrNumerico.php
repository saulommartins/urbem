<?php

namespace App\Services;


use Mockery\Exception;

class CampoTcePrNumericoService extends \App\Services\CampoService
{
	public function preparaConteudo() {
		$conteudo = (string) $this->getValor();
		if ($conteudo == '') {
			throw new Exception('Campo ' . $this->getNome() . ' é obrigatório!');
		}
		$qtdeZeroEsquerda = substr_count($this->getFormato(), '0') + strlen($conteudo);
		$conteudo = str_pad( $conteudo, $qtdeZeroEsquerda, "0", STR_PAD_LEFT);
		$inicioConteudo = (strlen($conteudo) > strlen($this->getFormato()) ?
			strlen($conteudo) - strlen($this->getFormato()) : 1);
		$conteudo = substr( $conteudo, $inicioConteudo - 1, strlen($conteudo));

        $this->setConteudo($conteudo);
    }

}
