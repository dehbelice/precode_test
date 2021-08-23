<?php

require_once (dirname(__FILE__)."\..\config.php");
require_once (dirname(__FILE__)."\Validation.php");

class Produtos {

    private $ID;
    private $cDescricao;
    private $cMarca;
    private $nQuantidade;
    private $rValor;
    private $cImagem;
    
    public function __construct($cDescricao="", $cMarca="", $nQuantidade="", $rValor="", $cImagem="") 
    {
        $this->setDesc("");
        $this->setMarca("");
        $this->setQuantidade("");
        $this->setValor("");
        $this->setImagem("");
    }

    public function setID($ID)
    {
        $this->ID = $ID;
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

    public function getID()
    {
        return $this->ID;
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

    // Rotina que inclui os dados digitados em tela
    function Inclui()
	{

        $config = new Config();
        $mysqli = $config->conecta();

        // Cria a Query de inclusão
        $sql = "INSERT INTO produtos (Descricao, Marca, Quantidade_Atual, Valor, Imagem_URL) VALUES (?, ?, ?, ?, ?)";

        if($stmt = $mysqli->prepare($sql)){
            // Binda as Variáveis
            $stmt->bind_param("ssids", $param_desc, $param_marca, $param_quantidade, $param_valor, $param_imagem);
            
            // Seta os Parametros
            $param_desc = $this->getDesc();
            $param_marca = $this->getMarca();
            $param_quantidade = $this->getQuantidade();
            $param_valor = $this->getValor();
            $param_imagem = $this->getImagem();
            
            // Tenta executar
            if($stmt->execute()){
                // Retorna true se sucesso
                return true;
               
            } else{
                // Retorna false se erro
                return false;
            }
        }
        
        // Fecha statement
        $stmt->close();
        
        
        // Fecha conexão
        $mysqli->close();
        
	}

    // Rotina que le a tela inicial
    function readAll()
	{

        $config = new Config();
        $mysqli = $config->conecta();

        // Começa a busca pelos dados
        $sql = "SELECT ID, Descricao, Marca, Quantidade_Atual, Valor, Imagem_URL FROM produtos";
        if($result = $mysqli->query($sql)){
            if($result = $mysqli->query($sql))
            {
                return $result;
            }
            else 
            {
                return false;
            }
        }
              
        // Fecha Conexão
        $mysqli->close();
	}
    
    // Rotina que le os dados de um determinado produto
    function leProduto()
	{

        $config = new Config();
        $mysqli = $config->conecta();

        // Começa a busca pelos dados
        $sql = "SELECT ID, Descricao, Marca, Quantidade_Atual, Valor, Imagem_URL FROM produtos WHERE ID = ?";

        if($stmt = $mysqli->prepare($sql)){
            // Binda as Variáveis
            $stmt->bind_param("i", $param_id);
            
            // Seta os Parametros
            $param_id = trim($this->getID());
            
            // Tenta executar
            if($stmt->execute()){
                $result = $stmt->get_result();
                
                if($result->num_rows == 1){
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    
                    // Devolve o conteudo
                    $aProduto = [];
                    $aProduto['Descricao'] = $row["Descricao"];
                    $aProduto['Marca'] = $row["Marca"];
                    $aProduto['Quantidade'] = $row["Quantidade_Atual"];
                    $aProduto['Valor'] = $row["Valor"];
                    $aProduto['Imagem_URL'] = $row["Imagem_URL"];

                    return $aProduto;
                } else{
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Erro Interno.";
            }
        }
         
        // Fecha statement
        $stmt->close();
        
        // Fecha Conexão
        $mysqli->close();
	}

    // Atualiza os dados do produto
    function atualizaProduto()
	{
        $config = new Config();
        $mysqli = $config->conecta();

        // Começa a busca pelos dados
        $sql = "UPDATE produtos SET Descricao=?, Marca=?, Quantidade_Atual=?, Valor=?, Imagem_URL=? WHERE ID=?";

        if($stmt = $mysqli->prepare($sql)){
            // Binda as Variáveis
            $stmt->bind_param("ssidsi", $param_desc, $param_marca, $param_quantidade, $param_valor, $param_imagem, $param_id);
            
            // Seta os Parametros
            $param_desc = $this->getDesc();
            $param_marca = $this->getMarca();
            $param_quantidade = $this->getQuantidade();
            $param_valor = $this->getValor();
            $param_imagem = $this->getImagem();
            $param_id = $this->getID();
            
            // Tenta executar
            if($stmt->execute()){
                // Retorna true se sucesso
                return true;
            } else{
                // Retorna false se erro
                return false;
            }
        }
        
        // Close statement
        $stmt->close();
        
        // Fecha conexão
        $mysqli->close();
    }

    // Deleta o produto
    function deletaProduto()
	{  
        $config = new Config();
        $mysqli = $config->conecta();

        // Prepara a Query
        $sql = "DELETE FROM produtos WHERE ID = ?";
        if($stmt = $mysqli->prepare($sql)){
            // Binda as Variáveis
            $stmt->bind_param("i", $param_id);
            
            // Seta os Parametros
            $param_id = trim($_POST["ID"]);
            
            // Tenta executar
            if($stmt->execute()){
                return true;
            } else{
                return false;
            }
        }
         
        // Fecha statement
        $stmt->close();
        
        // Fecha conexão
        $mysqli->close();
    }

}
?>