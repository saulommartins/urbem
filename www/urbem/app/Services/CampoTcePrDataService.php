<?php
/**
 * Created by PhpStorm.
 * User: saulo
 * Date: 08/05/18
 * Time: 11:21
 */

namespace App\Services;

use Mockery\Exception;

/**
 * Class CampoTcePrDataService
 *
 * @package App\Services
 */
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
	 * @param int $dia
	 * @param int $mes
	 * @param int $ano
	 */
	public function setData(int $dia, int $mes, int $ano) {
		$this->data = [];
		$this->data['d'] = $dia;
		$this->data['m'] = $mes;
		$this->data['y'] = $ano;
	}

	public function preparaConteudo() : void {
		$valor = $this->getData();
		if (empty($valor)) {
			throw new Exception('Campo ' . $this->getNome() . ' é obrigatório!');
		}
		$ano = str_pad($valor['y'],4, 0, STR_PAD_LEFT);
		$mes = str_pad($valor['m'],2,0,STR_PAD_LEFT);
		$dia = str_pad($valor['d'],2, 0,STR_PAD_LEFT);
		$conteudo = str_replace("AAAA", $ano, $this->getFormato());
		$conteudo = str_replace("MM", $mes, $conteudo);
		$conteudo = str_replace("DD", $dia, $conteudo);
		$this->setConteudo($conteudo);
	}

}
