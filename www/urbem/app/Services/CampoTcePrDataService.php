<?php
/**
 * Created by PhpStorm.
 * User: saulo
 * Date: 08/05/18
 * Time: 11:21
 */

namespace App\Services;

use Mockery\Exception;

class CampoTcePrDataService extends \App\Services\CampoService {

	/**
	 * @var array
	 */
	private $data;

	/**
	 * @return array
	 */

	public function getData(): array {
		return $this->data;
	}

	/**
	 * @param array $valor
	 */
	public function setData(int $dia, int $mes, int $ano) {
		$this->data = [];
		$this->data['d'] = $dia;
		$this->data['m'] = $mes;
		$this->data['y'] = $ano;
	}
	public function preparaConteudo() : void {
		$conteudo = $this->getData();
		if (empty($conteudo)) {
			throw new Exception('Campo ' . $this->getNome() . ' é obrigatório!');
		}
		$conteudo = str_pad($conteudo['y'],4, 0, STR_PAD_LEFT)."-".str_pad($conteudo['m'],2,
				0,
				STR_PAD_LEFT)."-".str_pad($conteudo['d'],2, 0, STR_PAD_LEFT);
		$this->setConteudo($conteudo);
	}

}
