<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../../EXCEL/buscar/styles.css" type="text/css">
	<title>GANADORES</title>
	

</head>

<header class="headerC">
      <div class="containerheader">
        <nav class="navC">
          <ul>
            <li style="writing-mode: horizontal-tb; display: inline-block; white-space: nowrap;"><a href="index.php">Nueva Consulta</a></li>    
          </ul>
        </nav>
      </div>
    </header>


<body class="body_fondo">
 
	<form method="post" action="">
		<label for="id" >
			<p class="guiaID">Ingresa tu número de cédula</p>
		</label>

		<label for="id" >
			<input type="text" id="id" name="id" pattern="\d+" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 8' placeholder="tu número de identificación">
		</label>

		<br><button type="submit" class="btn">Ingresar</button>

	</form>

	<table>

</script>

		<thead>
			<tr class="nombre_casilla">
				<th>Nombre del referido</th>
				<th>Periodo de matrícula</th>
				<th> Valor del bono</th>
				<th>Estado de pago</th>
			</tr>
		</thead>
		<tbody>

		<?php
		// Paso 1: Conectarse a la base de datos
		$conex = mysqli_connect("localhost", "root", "", "excel");
		
		// Paso 2: Obtener los datos del usuario y escapar caracteres especiales
		if (isset($_POST['id'])) {
			$id = mysqli_real_escape_string($conex, $_POST['id']);
		} else {
			$id = '';
		}

		// Paso 3: Realizar la consulta a la base de datos y obtener los resultados
		if ($id != '') {
			$sql = "SELECT Nombres, matriculas, bono, cedula_referido FROM ganadores WHERE id = $id";
			$resultado = mysqli_query($conex, $sql);

			// Paso 4: Mostrar los resultados en la página HTML
			if (mysqli_num_rows($resultado) > 0) {
			  while ($row = mysqli_fetch_assoc($resultado)) {
			    echo "<tr><td>" . $row['Nombres'] . "</td><td>" . $row['matriculas'] . "</td><td>" . $row['bono'] . "</td><td>" . $row['cedula_referido'] . "</td></tr>";
			  }
			} else {
			  echo "<tr><td colspan='4'>No se encontraron datos para el ID proporcionado.</td></tr>";
			}
		}

		// Paso 5: Cerrar la conexión a la base de datos
		mysqli_close($conex);
		
		?>
		</tbody>
	</table>

	
    <footer class="footer_encabezado">

		  <div class="p">Aceptas términos y condiciones</div>

		    <div id="footer">

			   <p class="parrafos_footer"> JESUS </p>
			    <p> LUISA  </p>

		     	<p>JUNIOR </p>
		   </div>


		   
    </footer>

</body>
</html>
