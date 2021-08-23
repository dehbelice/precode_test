<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="script.js"></script>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Demo_Ecommerce</title>
	<link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

	<header>
      <div class="carrinho">
      	 <h1>Carrinho</h1>
      	 <!-- Apenas quando tiver itens -->
	      <div class="carrinho-itens">
		  <nav class="navbar navbar-inverse bg-inverse fixed-top bg-faded">
			<div class="row">
				<div class="col">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart">Carrinho (<span class="total-count"></span>)</button><button class="clear-cart btn btn-danger">Limpar Carrinho</button></div>
			</div>
		  </nav>	
	      </div>
	      <!-- FIM Apenas quando tiver itens -->
      </h1>
    </header>
    <main>
      <section class="produtos">
      	<!-- Listagem de produtos colocar o foreach de produtos aqui -->
		  <?php
				// Adiciona a Classe de produtos para leitura
				require_once (dirname(__FILE__)."\..\Classes\Produtos.php");

				$Produtos = new Produtos();
				$result = $Produtos->readAll();
				if($result)
				{
					if($result->num_rows > 0){
						while($row = $result->fetch_array()){
							echo "<article class='produto-list'>";
							echo "<img class='img-produto' src='". $row['Imagem_URL'] . "' alt=' ' />";
							echo "<h1 class='nome-produto'>";
							echo $row['Descricao'];
							echo "</h1>";
							echo "<p class='marca'>". $row['Marca'] . "</p>";
							echo "<h1 class='Preco-produto'>";
							echo " R$ ". $row['Valor'];
							echo "</h1>";
							echo "<a class='add-to-cart btn btn-primary' data-name=". $row['Descricao'] . " data-price=". $row['Valor'] . " href='#'>Comprar</a>";
							echo "</article>";
						}
						
					} else{
						echo '<div class="alert alert-danger"><em>Ecommerce sem Itens.</em></div>';
					}
				} else{
					echo "Erro interno.";
				}
			?>
        
        <!-- Fim da Listagem de produtos colocar o foreach de produtos aqui -->
      </section>
    </main>
	<!-- Modal -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Carrinho</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="show-cart table">
          
        </table>
        <div>Valor Total: R$<span class="total-cart"></span></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Checkout</button>
      </div>
    </div>
  </div>
</div> 
</body>

</html>