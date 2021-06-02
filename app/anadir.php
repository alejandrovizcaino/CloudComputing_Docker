   
<!DOCTYPE html>
<head>
    <title>Agregar Producto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

	    body {
		  margin: 0;
		  font-family: Arial, Helvetica, sans-serif;
		}

		#products {
		  font-family: Arial, Helvetica, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		}

		#products td, #products th {
		  border: 1px solid #ddd;
		  padding: 8px;
		}

		#products tr:nth-child(even){background-color: #f2f2f2;}

		#products tr:hover {background-color: #ddd;}

		#products th {
		  padding-top: 12px;
		  padding-bottom: 12px;
		  text-align: left;
		  background-color: #04AA6D;
		  color: white;
		}
		.topnav {
		  overflow: hidden;
		  background-color: #333;
		}

		.topnav a {
		  float: left;
		  color: #f2f2f2;
		  text-align: center;
		  padding: 14px 16px;
		  text-decoration: none;
		  font-size: 17px;
		}

		.topnav a:hover {
		  background-color: #ddd;
		  color: black;
		}

		.topnav a.active {
		  background-color: #04AA6D;
		  color: white;
		}

		input[type=text], select {
		  width: 100%;
		  padding: 12px 20px;
		  margin: 8px 0;
		  display: inline-block;
		  border: 1px solid #ccc;
		  border-radius: 4px;
		  box-sizing: border-box;
		}

		input[type=submit] {
		  width: 100%;
		  background-color: #4CAF50;
		  color: white;
		  padding: 14px 20px;
		  margin: 8px 0;
		  border: none;
		  border-radius: 4px;
		  cursor: pointer;
		}

		input[type=submit]:hover {
		  background-color: #45a049;
		}

		#div_form {
		  border-radius: 5px;
		  background-color: #f2f2f2;
		  padding: 20px;
		}

</style>
</head>

<body>
	 <div class="topnav">
	  <a class="active" href="index.php">Listado Productos</a>
	  <a href="anadir.php">Agregar Producto</a>
	  <a href="eliminar.php">Eliminar Producto</a>
	</div>

	<div style="padding-left:16px">
	  <h2>Añadir un producto</h2>
	</div>

	<?php
	    include 'db_connection.php';

	    $conn = OpenCon();

	    if(isset($_POST['submit']))
		{		
		    $nombre = $_POST['php_nombre'];
		    $descripcion = $_POST['php_descripcion'];
		    $stock = $_POST['php_stock'];

		    $insert = "INSERT INTO `products`(`name`, `description`, `stock`) VALUES ('$nombre','$descripcion', '$stock')";
		    $conn->query($insert);

		    if(!$insert)
		    {
		        echo mysqli_error();
		    }
		    else
		    {
		        echo "Producto agregado con éxito.";
		    }
		}
	    CloseCon($conn);
    ?>

    <div id="div_form">
		<form method="POST">
		  Nombre : <input type="text" name="php_nombre" placeholder="Rellena el nombre" Required>
		  <br/>
		  Descripcion : <input type="text" name="php_descripcion" placeholder="Rellena la descripción" Required>
		  <br/>
		  Stock : <input type="text" name="php_stock" placeholder="Rellena la cantidad de stock" Required>
		  <br/>
		  <input type="submit" name="submit" value="Enviar datos">
		</form>
	</div>
    
  </body>