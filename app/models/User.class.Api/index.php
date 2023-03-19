<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Cargar el archivo JSON
$json_data = file_get_contents('people.json');
$data = json_decode($json_data, true);

// Acceder a la lista de personas
$people = $data['people'];

// Iterar sobre la lista de personas y mostrar sus nombres y contraseñas
echo "<pre>";
/*foreach ($people as $person) {
    $name = $person['name'];
    $password = $person['password'];
    $tasks = $person['tasks'];
    $speech = "Nombre: " . $name . ", tiene las tareas: ";
    for ($i=0; $i < 2; $i++) { 
        echo $speech.$tasks[$i]."<br/>";
    }
}*/

//foreach ($people as $person) {
    //$tasks = $person['tasks'];
    for ($i=0; $i < 2; $i++) { 
        echo $speech.$tasks[$i].", ";
    }    
//}

echo "</pre>";
/*fetch('https://jsonplaceholder.typicode.com/posts')
.then(response => {return response.json()})
.then(response=>{console.log(response.json)})*/
?>
</body>
</html>