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

			// Create an object from the user class
			$user = new User();
			
			// Get the list from people
			$people = $user->getAll();
			
			if (isset($_POST['submit'])) {
				// Get the forms values
				$name = $_POST['name'];
				$password = $_POST['password'];
				$tasks = explode(",", $_POST['tasks']);
			
				// Create a new record
				$user->create($name, $password, $tasks);
			
				// Redirect to the current page to update the table
				header("Location: " . $_SERVER['PHP_SELF']);
				exit();
			  }

			// Iterate for the people and show their information
			echo "<br/>";
			echo "<br/>";
			echo "<br/>";
			foreach ($people as $person) {
				$name = $person['name'];
				$password = $person['password'];
				$tasks = implode(", ", $person['tasks']);
				echo "<tr><td>$name</td><td>$password</td><td>$tasks</td></tr>";
			}
			
			// Create a new record
			$user->create('Juan Perez', 'juan456', ['tarea9']);
			
			// Update an existing record
			$user->update(0, 'John Doe', 'joh123', ['tarea1', 'tarea2', 'tarea10']);
			
			// Delete and exitind record
			$user->delete(3);
		?>
	</table>
</body>
</html>