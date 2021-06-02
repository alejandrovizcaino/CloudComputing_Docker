   
<!DOCTYPE html>
<head>
    <title>Listado de Productos</title>
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

</style>
</head>

<body>
	 <div class="topnav">
	  <a class="active" href="index.php">Listado Productos</a>
	  <a href="anadir.php">Agregar Producto</a>
	  <a href="eliminar.php">Eliminar Producto</a>
	</div>

	<div style="padding-left:16px">
	  <h2>Listado de productos</h2>
	  <p>Esta es mi lista: </p>
	</div>

    <?php
	    include 'db_connection.php';
	    $conn = OpenCon();

	    $sql = "SELECT id, name, description, stock FROM products";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  // output data of each row
		  echo '<table id="products">';
		  echo "<tr> <th>ID</th> <th>Nombre</th> <th>Descripción</th> <th>Stock</th> </tr>";
		  while($row = $result->fetch_assoc()) {
		  	echo '<tr>';
		    echo "<td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["description"]. "</td><td>" . $row["stock"]. "</td>";
		    echo '</tr>';
		  }
		  echo '</table>';
		} else {
		  echo "Sin resultados.";
		}

	    CloseCon($conn);
    ?>

  </body>