<!DOCTYPE html>
<html>
<head>
<title>Validação de formulário</title>
</head>
<body>


<?php

 if (isset($_POST['enviar-formulario'])):
	echo "Enviou <br>";
	//var_dump($_POST); //superglobal $_POST
	//$erros = array(); //array de erros
	$idade = $_POST['idade'];
	echo $_POST['idade'];

	
endif;

if (isset($_POST['enviar-formulario1'])):
	echo "Enviou <br>";
	//var_dump($_POST); //superglobal $_POST
	//$erros = array(); //array de erros
	$idade = $_POST['idade1'];
	echo $_POST['idade1'];

	
endif;
 
?>


<!--Vai imprimir o nome da própria página  (auto chamada)-->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

	Idade: <input type="text" name="idade"><br>


	<button type="submit" name="enviar-formulario"> Enviar </button>

</form>


<hr>


<!--Vai imprimir o nome da própria página  (auto chamada)-->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

	Idade: <input type="text" name="idade1"><br>


	<button type="submit" name="enviar-formulario1"> Enviar1 </button>

</form>
</form>



<hr>


<!--Vai imprimir o nome da própria página  (auto chamada)-->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

	Idade: <input type="text" name="idade2"><br>


	<button type="submit" name="enviar-formulario2"> Enviar2 </button>

</form>
</form>

</body>

</html>