<?php

namespace App\Services;


/**
 * Class LinhaService
 * @package App\Services
 */
class LinhaService
{
    /**
     * @var array
     */
    private $campos;

    /**
     * @return array
     */
    public function getCampos()
    {
        return $this->campos;
    }

    /**
     * @param array $campos
     */
    public function setCampos($campos)
    {
        $this->colunas = $campos;
    }

    /**
     * @param CampoService $campo
     */
    public function addCampo($campo) {
        $this->campos[] = $campo;
    }

    public function getConteudo () {
        return '';
    }
}