<?php 
class User {
  private $data;

  public function __construct() {
      // Read JSON file
      $json = file_get_contents('people.json');
      $this->data = json_decode($json, true);
  }

  public function getAll() {
      // Obtener la lista de personas
      $people = $this->data['people'];
      return $people;
  }

  public function getById($id) {
      // Get person by array_index
      $person = $this->data['people'][$id];
      return $person;
  }

  public function create($name, $password, $tasks) {
      // Create a new record
      $new_person = array(
          'name' => $name,
          'password' => $password,
          'tasks' => $tasks
      );
      array_push($this->data['people'], $new_person);

      //   Write the data into the file JSON
      $json = json_encode($this->data);
      file_put_contents('people.json', $json);
  }

  public function update($id, $name, $password, $tasks) {
      // Update an existing record
      $this->data['people'][$id]['name'] = $name;
      $this->data['people'][$id]['password'] = $password;
      $this->data['people'][$id]['tasks'] = $tasks;

      // Write the data into the file JSON
      $json = json_encode($this->data);
      file_put_contents('people.json', $json);
  }

  public function delete($id) {
      // Delete and existing record
      array_splice($this->data['people'], $id, 1);

      // Write the data into the JSON file
      $json = json_encode($this->data);
      file_put_contents('people.json', $json);
  }
}
?>
