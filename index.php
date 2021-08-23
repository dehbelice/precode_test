<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teste Precode</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 1200px;
            margin: 0 ;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Dados de Produtos</h2>
                        <a href="create.php" class="btn btn-dark pull-right"><i class="fa fa-plus"></i> Incluir Produto</a>
                        <a href="\precode_test\Demo_Ecommerce\index.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Demo Ecommerce</a>
                    </div>
                    <?php
                    // Adiciona a Classe de produtos para leitura
                    require_once (dirname(__FILE__)."\Classes\Produtos.php");

                    $Produtos = new Produtos();
                    $result = $Produtos->readAll();
                    if($result)
                    {
                        if($result->num_rows > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>id</th>";
                                        echo "<th>Descrição</th>";
                                        echo "<th>Marca</th>";
                                        echo "<th>Valor</th>";
                                        echo "<th>Imagem (URL)</th>";
                                        echo "<th>Quantidade Atual</th>";
                                        echo "<th>Açao</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch_array()){
                                    echo "<tr>";
                                        echo "<td>" . $row['ID'] . "</td>";
                                        echo "<td>" . $row['Descricao'] . "</td>";
                                        echo "<td>" . $row['Marca'] . "</td>";
                                        echo "<td>" . $row['Valor'] . "</td>";
                                        echo "<td>" . $row['Imagem_URL'] . "</td>";
                                        echo "<td>" . $row['Quantidade_Atual'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="read.php?ID='. $row['ID'] .'" class="mr-3" title="Visualizar" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="update.php?ID='. $row['ID'] .'" class="mr-3" title="Editar" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="delete.php?ID='. $row['ID'] .'" title="Deletar" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            
                        } else{
                            echo '<div class="alert alert-danger"><em>Tabela sem dados para exibição.</em></div>';
                        }
                    } else{
                        echo "Erro interno.";
                    }
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html> 