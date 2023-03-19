<?php 
class User {
    private $name;
    private $password;
    
    private $users = array();
    private $tasks;
    function __construct($name, $password){
        $this->name = $name;
        $this->password = $password;
        $this->tasks=[];
    }

    //public function addTask($name, $status,$date_start) {
     // $this->tasks[] = new task($name, $status, $date_start);
    //}
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
