<?php 
require_once __DIR__.'../../../lib/base/Model.php';
class task extends Model {

    private $jsonFile;
    private $tasks;

    //constructor

    public function __construct()
    {
        $this-> jsonFile = file_get_contents( __DIR__.'../../../web/database.json');
        $this-> tasks= json_decode($this->jsonFile,true);
    }


    public function getTasks(){

        return $this->tasks;

//prueba
    //    echo '<pre>';
    //     var_dump($this->tasks) ;
             
        
    }

    function getTaskById($id){

        $users= $this->tasks;
        foreach($users as $user){
            if($user['id'] == $id){
                return $user;
                // echo '<pre>';
                // var_dump($user);
            }
        }
        return null;



    }

    function intoJson($addTask){
        file_put_contents(__DIR__ . '../../../web/database.json', json_encode($addTask, JSON_PRETTY_PRINT));
    }

    function createTask($user, $task){
       
        $data = $this ->tasks;

        $lastTask = end($this->tasks);
        $newId = $lastTask['id'] + 1;

        $data['id'] = $newId;
        $data['user'] = $user;
        $data['task'] = $task;
        $data['status'] = 'pending';
        $data['start_date'] = date('Y-m-d h:i:sa');

        $this->tasks[] = $data;
        $this->intoJson($this->tasks);
        return $user;
        
    }
    
    // function updateTask($data,$id){
    //     $users= $this->tasks;
    //     foreach($users as $i => $user){
    //         if($user['id'] == $id){

    //         }


    // }

function deleteTask($id){
       
   $users = $this->tasks;       
    foreach ($users as $user) {
        unset($user["id"]);
        }
        header("Location: index.php");
    }

    function completeTask($id){
        $data= $this -> tasks;

        foreach($data as $i => $dataStatus){
            if($dataStatus['id'] == $id ){
                $data [$i]['end_date'] = date("Y-m-d");

                $this -> intoJson($data);
            }
        }
    }

    function editTask($id,$user,$taskName,$status){

        $data = $this ->tasks;
        //busco en el array de tareas tomando en cuenta el indice
        foreach ($data as $i => $dataChange){
            if ($dataChange['id'] == $id){
                $data[$i]['task']=$taskName;
                $data[$i]['user']=$user;
                $data[$i]['status']=$status;

                $this -> intoJson($data);
            }

            
        }

        
    }

        
}

?>