<?php


  class connection{





    public function connect(){
        $servername='localhost:3308';
        $username='root';
        $password='';
        $dbname='taskboard';

        $conn = new mysqli($servername,$username, $password,$dbname); 

        return $conn;
    }





}

?>