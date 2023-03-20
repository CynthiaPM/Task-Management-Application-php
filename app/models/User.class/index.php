<?php
require_once 'User.Class.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
	<h2>Agregar nuevo usuario</h2>
	<form action="" method="post">
		<label for="name">Nombre:</label>
		<input type="text" name="name" id="name">
		<br>
		<label for="password">Contraseña:</label>
		<input type="password" name="password" id="password">
		<br>
		<label for="tasks">Tareas:</label>
		<input type="text" name="tasks" id="tasks">
		<br>
		<button type="submit" name="submit">Agregar</button>
	</form>
	<table border="1px solid #000">
		<tr>
			<th>Nombre</th>
			<th>Contraseña</th>
			<th>Tareas</th>
		</tr>
		<?php

			// Crear un objeto de la clase User
			$user = new User();
			
			// Obtener la lista de personas
			$people = $user->getAll();
			
			if (isset($_POST['submit'])) {
				// Obtener los valores del formulario
				$name = $_POST['name'];
				$password = $_POST['password'];
				$tasks = explode(",", $_POST['tasks']);
			
				// Crear un nuevo registro
				$user->create($name, $password, $tasks);
			
				// Redirigir a la página actual para actualizar la tabla
				header("Location: " . $_SERVER['PHP_SELF']);
				exit();
			  }

			// Iterar sobre las personas y mostrar su información
			echo "<br/>";
			echo "<br/>";
			echo "<br/>";
			foreach ($people as $person) {
				$name = $person['name'];
				$password = $person['password'];
				$tasks = implode(", ", $person['tasks']);
				echo "<tr><td>$name</td><td>$password</td><td>$tasks</td></tr>";
			}
			
			// Crear un nuevo registro
			$user->create('Juan Perez', 'juan456', ['tarea9']);
			
			// Actualizar un registro existente
			$user->update(0, 'John Doe', 'joh123', ['tarea1', 'tarea2', 'tarea10']);
			
			// Eliminar un registro existente
			$user->delete(3);
		?>
	</table>
</body>
</html>