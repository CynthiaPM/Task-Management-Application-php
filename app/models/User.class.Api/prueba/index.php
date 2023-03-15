<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post" target="_self">
    <label for="name">Nombre: </label>
    <input type="text" id="name" name="name" value="" placeholder="Escribe tu nombre">
    <label for="password">Contraseña: </label>
    <input type="text" id="password" name="password" value="" placeholder="Escribe tu contraseña">
    <input type="submit" value="Enviar">
    </form>

    <?php 
class Database {
    private $users = array();
  
    public function addUserData() {
      $name = $_POST['name'];
      $password = $_POST['password'];
      $this->users[] = array('name' => $name, 'password' => $password);
    }
  
    public function createJSONDatabase() {
      $json = json_encode($this->users);
      file_put_contents('database.json', $json);
    }
  }
  
?>
<?php 

$database = new Database();
$database->addUserData();
$database->createJSONDatabase();

echo "<pre>";
var_dump($database);
echo "</pre>";

?>
</body>
</html>