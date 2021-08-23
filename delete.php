<?php

// Adiciona arquivos necessários
require_once (dirname(__FILE__)."\Classes\Produtos.php");
require_once (dirname(__FILE__)."\Classes\Validation.php");

// Process delete operation after confirmation
if(isset($_POST["ID"]) && !empty($_POST["ID"])){

    $Produtos = new Produtos();

    $Produtos->setID($_GET["ID"]);

    $result = $Produtos->deletaProduto();

    if($result)
    {
        header("location: index.php");
        exit();
    }
    else
    {
        echo "Erro Interno.";
    }
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["ID"]))){
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Record</title>
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
                    <h2 class="mt-5 mb-3">Deletar Produto</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="ID" value="<?php echo trim($_GET["ID"]); ?>"/>
                            <p>Tem Certeza que deseja excluir?</p>
                            <p>
                                <input type="submit" value="Sim" class="btn btn-danger">
                                <a href="index.php" class="btn btn-secondary ml-2">Não</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
