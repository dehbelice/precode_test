<?php

class Validation {

    private $cDescricao;
    private $cMarca;
    private $nQuantidade;
    private $rValor;
    private $cImagem;
    
    public function __construct($cDescricao="", $cMarca="", $nQuantidade="",$rValor="", $cImagem="")
    {
        $this->setDesc("");
        $this->setMarca("");
        $this->setQuantidade("");
        $this->setValor("");
        $this->setImagem("");
    }

    public function setDesc($cDescricao)
    {
        $this->cDescricao = $cDescricao;
    }

    public function setMarca($cMarca)
    {
        $this->cMarca = $cMarca;
    }

    public function setQuantidade($nQuantidade)
    {
        $this->nQuantidade = $nQuantidade;
    }

    public function setValor($rValor)
    {
        $this->rValor = $rValor;
    }

    public function setImagem($cImagem)
    {
        $this->cImagem = $cImagem;
    }

    public function getDesc()
    {
        return $this->cDescricao;
    }

    public function getMarca()
    {
        return $this->cMarca;
    }

    public function getQuantidade()
    {
        return $this->nQuantidade;
    }

    public function getValor()
    {
        return $this->rValor;
    }

    public function getImagem()
    {
        return $this->cImagem;
    }

    // Rotina que valida os dados digitados em tela
    function Valida()
	{
        $cErroDescricao = "";
        $cErroMarca = "";
        $cErroQuantidade = "";
        $cErroValor = "";
        $cErroImagem = "";
        
        if(empty($this->getDesc())){
            $cErroDescricao = "Insira uma Descrição.";
        }
        
        if(empty($this->getMarca())){
            $cErroMarca = "Insira uma Marca.";     
        }
        
        if(empty($this->getQuantidade())){
            $cErroQuantidade = "Selecione uma quantidade.";     
        } elseif(!ctype_digit($this->getQuantidade())){
            $cErroQuantidade = "A quantidade deve ser um número.";
        }

        if(empty($this->getValor())){
            $cErroValor = "Insira um Valor.";     
        } 

        if(empty($this->getImagem())){
            $cErroImagem = "Insira uma URL para a Imagem.";
        }

		if (empty($cErroDescricao) && empty($cErroMarca) && empty($cErroQuantidade) && empty($cErroValor) && empty($cErroImagem)){
            return true;
        }
        else
        {
            $aErro = [];
            $aErro["Error_Descricao"] = $cErroDescricao;
            $aErro["Error_Marca"] = $cErroMarca;
            $aErro["Error_Quantidade"] = $cErroQuantidade;
            $aErro["Error_Valor"] = $cErroValor;
            $aErro["Error_Imagem"] = $cErroImagem;

            return $aErro;
        }
	}

}
?>