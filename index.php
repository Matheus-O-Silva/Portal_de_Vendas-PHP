<?php

require_once "classes/conexao.php"; 
	$obj = new conectar();
	$conexao = $obj->conexao();

	$sql = "SELECT * from usuarios where email='admin'";
	$result = mysqli_query($conexao, $sql);

	$validar = 0;
	if(mysqli_num_rows($result) > 0){
		$validar = 1;
    }



?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    <script src="lib/jquery-3.2.1.min.js"></script>
	<script src="js/funcoes.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-image:url(img/pexels.jpg); width:100%; height:100px;">                       
    <br><br><br>
        <div class="container">
            <div class="row" id="painel">  
                <div class="col-sm-8"></div>
                <div class="col-sm-8">
				<div class="panel panel-primary">
					<div class="panel panel-heading"><span id="portal">Portal</span></div>
					<div class="panel panel-body">
						<form id="frmLogin">
							<label>Email</label>
							<input type="text" class="form-control input-sm" name="email" id="email">
							<label>Senha</label>
							<input type="password" name="senha" id="senha" class="form-control input-sm">
							<p></p>
							<span class="btn btn-primary btn-sm" id="entrarSistema">Entrar</span>
							<?php if(!$validar): ?>


							<?php 
								endif;
							 ?>
							
						</form>
					</div>
				</div>
			</div>

            </div>
        </div>

</body>
</html>
