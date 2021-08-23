<?php
// Adiciona o Arquivos necessários
require_once (dirname(__FILE__)."\Classes\Produtos.php");
require_once (dirname(__FILE__)."\Classes\Validation.php");
 
// Inicializa as variáveis
$cDescricao = "";
$cMarca = "";
$nQuantidadeAtual = "";
$rValor = "";
$cImagem = "";

$cErroDescricao = "";
$cErroMarca = "";
$cErroQuantidade = "";
$cErroValor = "";
$cErroImagem = "";
 
// Processa os dados do POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $cDescricao = trim($_POST["Desc"]);
    $cMarca = trim($_POST["Marca"]);
    $nQuantidadeAtual = trim($_POST["quantidade"]);
    $rValor = trim($_POST["valor"]);
    $cImagem = trim($_POST["imagem"]);

    $Validation = new Validation();

    $Validation->setDesc($cDescricao);
    $Validation->setMarca($cMarca);
    $Validation->setQuantidade($nQuantidadeAtual);
    $Validation->setValor($rValor);
    $Validation->setImagem($cImagem);

    $retornoValidacao = $Validation->Valida();

    if(!is_array($retornoValidacao))
    {
        $Produtos = new Produtos();

        $Produtos->setDesc($Validation->getDesc());
        $Produtos->setMarca($Validation->getMarca());
        $Produtos->setQuantidade($Validation->getQuantidade());
        $Produtos->setValor($Validation->getValor());
        $Produtos->setImagem($Validation->getImagem());

        $Success = $Produtos->Inclui();
        
        if($Success)
        {
            header("location: index.php");
            exit();
        }
        else
        {
            echo "Erro Interno.";
        }
        
    }
    else
    {
        $cErroDescricao = $retornoValidacao['Error_Descricao'];
        $cErroMarca = $retornoValidacao['Error_Marca'];
        $cErroQuantidade = $retornoValidacao['Error_Quantidade'];
        $cErroValor = $retornoValidacao['Error_Valor'];
        $cErroImagem = $retornoValidacao['Error_Imagem'];
    }
}
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Criar Produto</title>
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
                    <h2 class="mt-5">Criar Produto</h2>
                    <p>Preencha os dados do produto a ser cadastrado.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Descrição</label>
                            <input type="text" name="Desc" class="form-control <?php echo (!empty($cErroDescricao)) ? 'is-invalid' : ''; ?>" value="<?php echo $cDescricao; ?>">
                            <span class="invalid-feedback"><?php echo $cErroDescricao;?></span>
                        </div>
                        <div class="form-group">
                            <label>Marca</label>
                            <textarea name="Marca" class="form-control <?php echo (!empty($cErroMarca)) ? 'is-invalid' : ''; ?>"><?php echo $cMarca; ?></textarea>
                            <span class="invalid-feedback"><?php echo $cErroMarca;?></span>
                        </div>
                        <div class="form-group">
                            <label>Valor R$</label>
                            <input type="text" name="valor" class="form-control <?php echo (!empty($cErroValor)) ? 'is-invalid' : ''; ?>" value="<?php echo $rValor; ?>">
                            <span class="invalid-feedback"><?php echo $cErroValor;?></span>
                        </div>
                        <div class="form-group">
                            <label>Imagem (URL)</label>
                            <input type="text" name="imagem" class="form-control <?php echo (!empty($cErroImagem)) ? 'is-invalid' : ''; ?>" value="<?php echo $cImagem; ?>">
                            <span class="invalid-feedback"><?php echo $cErroImagem;?></span>
                        </div>
                        <div class="form-group">
                            <label>Quantidade Atual</label>
                            <input type="text" name="quantidade" class="form-control <?php echo (!empty($cErroQuantidade)) ? 'is-invalid' : ''; ?>" value="<?php echo $nQuantidadeAtual; ?>">
                            <span class="invalid-feedback"><?php echo $cErroQuantidade;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Salvar">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>