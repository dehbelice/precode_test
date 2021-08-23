<?php

// Adiciona arquivos necessários
require_once (dirname(__FILE__)."\Classes\Produtos.php");
require_once (dirname(__FILE__)."\Classes\Validation.php");

// Verifica se foi passado ID para leitura da tela
if(isset($_GET["ID"]) && !empty(trim($_GET["ID"]))){

    $Produtos = new Produtos();

    $Produtos->setID($_GET["ID"]);

    $result = $Produtos->leProduto();

    if(is_array($result))
    {
        $cDescricao = $result["Descricao"];
        $cMarca = $result["Marca"];
        $nQuantidade = $result["Quantidade"];
        $rValor = $result["Valor"];
        $cImagem = $result["Imagem_URL"];
    }
    else 
    {
        // Não encontrou ID, manda para tela de erro
        header("location: error.php");
        exit(); 
    }
} else{
    // Não encontrou ID, manda para tela de erro
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">Visualizar Produto</h1>
                    <div class="form-group">
                        <label>Descrição</label>
                        <p><b><?php echo $cDescricao; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Marca</label>
                        <p><b><?php echo $cMarca; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Valor R$</label>
                        <p><b><?php echo $rValor; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Imagem (URL)</label>
                        <p><b><?php echo $cImagem; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Quantidade Atual</label>
                        <p><b><?php echo $nQuantidade; ?></b></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Voltar</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
