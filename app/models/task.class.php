<<?php 

enum taskStatus {
    case done;
    case progreso;
    case finish;
}

class task {

    private $name;
    private taskStatus $status;
    private $date_start;
    private $date_ending;
    
    
    /*enum taskProgress {
        case done;
        case progreso;
        case finish;

    }*/

    //constructor

    function __construct($name,$status,$date_start)
    {
        $this -> name = $name;
        $this -> status = $status;
        $this -> date_start = $date_start;
        $this -> date_ending = null;
    }

    //getters 

    public function getName(){
        return $this -> name;
    }

    public function getStatus(){
        return $this -> status;
    }

    //setters

    public function setName($name){
        $this-> name = $name;
    }



    



}

?>