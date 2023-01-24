<?php

use function PHPSTORM_META\type;

require(MODELS."/connexion.php");
class methods extends connection{
    public $task_text;
    public $task_position ;
    public $id_user ;
    public $id_task ;
    public $task_height = 39;
    public $task_date;
    public $arrow_pos;

    public function set_task_text($text){
        $this->task_text = $text;
    }
    public function set_task_position($position){
        $this->task_position = $position;
    }
    public function set_task_height($task_height){
        $this->task_height = $task_height;
    }

    public function set_task_date($task_date){
        $this->task_date = $task_date;
    }

    public function set_id_task($id_task){
        $this->id_task = $id_task;
    }
    public function set_arrow_pos($arrow_pos){
        $this->arrow_pos = $arrow_pos;
    }

    public function set_id_user($id_user){
        $this->id_user = $id_user;
    }

    public function display(){
        $sql ="SELECT * FROM `task` where id_user = $this->id_user ";
        $result = $this->connect()->query($sql);
   
        return $result;
    }

    public function insert(){
        $this->task_height = (int)( $this->task_height);

        // var_dump($this->task_text);
        // die;
        $con =  $this->connect();
        $stmt  = $con-> prepare("INSERT INTO task (task_text,task_position,task_date,height,id_user) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssii",$this->task_text,$this->task_position,$this->task_date, $this->task_height ,$this->id_user);
        $stmt->execute();
        $stmt->close();
    }
    public function update(){
        $this->task_height = (int)( $this->task_height);
        $this->id_task = (int)($this->id_task);
        $con =  $this->connect();
        $stmt  = $con-> prepare("UPDATE task SET task_text = ? , task_date = ?,  height = ? where id_task  = ?");
        $stmt->bind_param("ssii",$this->task_text,$this->task_date ,$this->task_height,$this->id_task );
        $stmt->execute();
        $stmt->close();
    }

    public function updatepos(){

        $this->id_task = (int)($this->id_task);

        // echo gettype($pos);

        // die;
        $con =  $this->connect();
        $stmt  = $con-> prepare("UPDATE task SET task_position =  ? where id_task  =?");
        $stmt->bind_param("si",$this->task_position, $this->id_task);
        $stmt->execute();
        $stmt->close();
        
        // $sql = "UPDATE `task` set task_position = `$this->task_position` where  id_task  = `$this->id_task` ";
        // var_dump($sql);
        // $result = $this->connect()->query($sql);
        
    }

    

    public function delete(){
        $sql = "DELETE from `task` where  id_task  = $this->id_task ";
        $result = $this->connect()->query($sql);
        return $result;
    }

    public function DESC_display (){
        $sql = "SELECT * FROM task WHERE task_position = '$this->arrow_pos' ORDER BY task_date  DESC ; ";
        $result = $this->connect()->query($sql);
        return $result;
    } 
    public function ASC_display (){
        $sql = "SELECT * FROM task WHERE task_position = '$this->arrow_pos' ORDER BY task_date  ASC ; ";
        $result = $this->connect()->query($sql);
        return $result;
    } 
    public function Not_ASC_display(){
        $sql = "SELECT * FROM task WHERE task_position !=  '$this->arrow_pos' ";
        $result = $this->connect()->query($sql);
        return $result;
    }


    public function stats($pos,$id){
        $sql = "SELECT * FROM `task` WHERE task_position = '$pos' && id_user = '$id' ";
        $result = $this->connect()->query($sql);
        $result = mysqli_num_rows($result);
        return $result;

    }

    


}




?>