<?php include_once 'Config/private.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Resources/css/util.css">
	<link rel="stylesheet" type="text/css" href="Resources/css/main.css">
    <title>Document</title>
</head>
<body>
    <h1>SOY ADMIN</h1>
    <h3>Bienvenido </h3>
    <?php echo $_SESSION['nickname']; ?>
    <br>
    <a href="?c=salir">Cerrar sesión</a>
</body>
</html>