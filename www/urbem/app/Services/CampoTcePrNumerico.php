<?php

namespace App\Services;


use Mockery\Exception;

class CampoTcePrNumericoService extends \App\Services\CampoService
{
	public function preparaConteudo() : void {
		$conteudo = $this->getValor();
		if ($conteudo == '') {
			throw new Exception('Campo ' . $this->getNome() . ' é obrigatório!');
		}
		$qtdeZeroEsquerda = strlen($this->getFormato());
		$conteudo = str_pad( $conteudo, $qtdeZeroEsquerda, "0", STR_PAD_LEFT);
		$inicioConteudo = (strlen($conteudo) > strlen($this->getFormato()) ?
			strlen($conteudo) - strlen($this->getFormato()) : 0);
		$conteudo = substr( $conteudo, $inicioConteudo, strlen($conteudo));
        $this->setConteudo($conteudo);
    }

}
