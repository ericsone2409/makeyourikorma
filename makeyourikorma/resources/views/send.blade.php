<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Correo De MYI</title>
</head>
<body>
	<h2>El ikorma creado fue:</h2><br>
	<img src="{{ url('myi/show/'.$id) }}">

	<h4>si no puede visualizar la imagen por favor ingrese en el siguiente link: <a href="{{ url('myi/show/'.$id) }}">IKORMA</a></h4>
</body>
</html>