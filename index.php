<?php 
require_once "circulo.php";
require_once "triangulo.php";

$circulo = new Circulo(2,2,2);

// $triangulo = new Triangulo(8,6,10);// triangulo retangulo, escaleno
// $triangulo = new Triangulo(2,2,2);// triangulo acutangulo, equilatero
$triangulo = new Triangulo(15,15,22.981);//  triangulo obtusangulo, isosceles


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Figuras</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/theme.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-6">
				<h1 class="text-center">Circulo</h1>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Circulo</h3>
					</div>
					<div class="panel-body">
						<pre>
							<?php var_dump ($circulo); ?>
						</pre>
					</div>
				</div>

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">raio</h3>
					</div>
					<div class="panel-body">
						<?php echo ($circulo->raio()); ?>
					</div>
				</div>

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Area</h3>
					</div>
					<div class="panel-body">
						<?php echo ($circulo->area()); ?>
					</div>
				</div>
				
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Diametro</h3>
					</div>
					<div class="panel-body">
						<?php echo ($circulo->diametro()); ?>
					</div>
				</div>

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Perimetro</h3>
					</div>
					<div class="panel-body">
						<?php echo ($circulo->perimetro()); ?>
					</div>
				</div>	

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">In range </h3>
					</div>
					<div class="panel-body">

						<?php echo $retVal = ((var_dump($circulo->emRango(5,1))) ? "sim" : "não"); ?>
						<?php echo (var_dump($circulo->emRango(1,1))); ?>
						<?php echo (var_dump($circulo->emRango(0,0))); ?>
					</div>
				</div>
			</div>

			<!-- /////////////////////////////////////////////////////////////////////////////////////////// -->
			
			<div class="col-xs-6">
				<h1 class="text-center">Triangulo</h1>

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">triangulo</h3>
					</div>
					<div class="panel-body">
						<pre>
							<?php var_dump($triangulo); ?>
						</pre>
					</div>
				</div>
				
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">area</h3>
					</div>
					<div class="panel-body">
						<?php echo ($triangulo->area()); ?>
					</div>
				</div>			

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">perimetro</h3>
					</div>
					<div class="panel-body">
						<?php echo ($triangulo->perimetro()); ?>
					</div>
				</div>
				
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Clasificacao segundo os seus lados</h3>
					</div>
					<div class="panel-body">
						<?php echo ($triangulo->classificacaoLados()); ?>
					</div>
				</div>
				
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Clasificacao segundo os seus Angulos</h3>
					</div>
					<div class="panel-body">
						<?php echo $triangulo->classificacaoAngulos(); ?>
					</div>
				</div>

			</div>
		</div>
	</body>
	</html>