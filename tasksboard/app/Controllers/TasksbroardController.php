<?php

class TasksbroardController extends methods {
    public function tasks(){
        if (!isset($_SESSION['id'])){
            header("location:http://trelly/user/login");
        }else {
        $this->set_id_user($_SESSION['id']);
        $data['datas'] = $this->display();
        $data['todo_num'] = $this->stats('todo',$_SESSION['id']);
        $data['doing_num'] = $this->stats('doing',$_SESSION['id']);
        $data['done_num'] = $this->stats('done',$_SESSION['id']);



        if(isset($_SESSION['id'])){
            $data['login'] = 'logout';
        }else {
            $data['login'] = 'login';
        }


        if(isset($_POST['logout'])){
            session_destroy();
            header("location:http://trelly/user/login");
        }

        

        if(isset($_POST['save'])){
            if (!isset($_POST['id'])){
                $this->set_task_text($_POST['task_text']);
                $this->set_task_position($_POST['hideninput']);
                $this->set_task_height($_POST['height']);
                $this->set_task_date($_POST['date']);
                // var_dump($_POST['height']);
                // die;
                $this->insert();
                $data['datas'] = $this->display();
                
            }if (isset($_POST['save']) && isset($_POST['id']) ){
                $this->set_task_text($_POST['task_text']);
                $this->set_id_task($_POST['id']);
                $this->set_task_height($_POST['height']);
                $this->set_task_date($_POST['date']);
                
                $this->update();
                $data['datas'] = $this->display();
            }
        }
        if(isset($_POST['delete'])){
            $this->set_id_task($_POST['id']);
            $this->delete();
            $data['datas'] = $this->display();
            $data['todo_num'] = $this->stats('todo',$_SESSION['id']);
            $data['doing_num'] = $this->stats('doing',$_SESSION['id']);
            $data['done_num'] = $this->stats('done',$_SESSION['id']);
        }

        if(isset($_POST['idd']) && isset($_POST['position']) ){
            $this->set_id_task($_POST['idd']);
            $this->set_task_position($_POST['position']);
            $this->updatepos();
            $data['todo_num'] = $this->stats('todo',$_SESSION['id']);
            $data['doing_num'] = $this->stats('doing',$_SESSION['id']);
            $data['done_num'] = $this->stats('done',$_SESSION['id']);
        }

        if(isset($_POST['arrowdown'])){
            // die;
            $this->set_arrow_pos($_POST['arrow_pos']);
            // var_dump($_POST['arrow_pos']);
            // die;
            // $it = new AppendIterator;
            // $it->append(new IteratorIterator( $this->Not_ASC_display()));
            // $it->append(new IteratorIterator($this->ASC_display()));
            $result = [];
            $result2 =  $this->Not_ASC_display();
            $result1 = $this->DESC_display();
            while ($row =mysqli_fetch_assoc($result1))
            {
                $result[] = $row;
            }

            while ($row = mysqli_fetch_assoc($result2))
                {
                    $result[] = $row;
                }
            

            // $merged_results = array_merge($result1,$result2);

            // var_dump($result);


            $data['datas'] = $result;


        }
        

        if(isset($_POST['arrowUp'])){
            // die;
            $this->set_arrow_pos($_POST['arrow_pos']);
            // var_dump($_POST['arrow_pos']);
            // die;
            // $it = new AppendIterator;
            // $it->append(new IteratorIterator( $this->Not_ASC_display()));
            // $it->append(new IteratorIterator($this->ASC_display()));
            $result = [];
            $result2 =  $this->Not_ASC_display();
            $result1 = $this->ASC_display();
            while ($row =mysqli_fetch_assoc($result1))
            {
                $result[] = $row;
            }

            while ($row = mysqli_fetch_assoc($result2))
                {
                    $result[] = $row;
                }
            

            // $merged_results = array_merge($result1,$result2);

            // var_dump($result);


            $data['datas'] = $result;


        }

        if(isset($_POST['addmulti'])){
            $number_of_tasks = $_POST['num_task'];
            if($number_of_tasks != 1){
             $i = 1;
            while($i <= $number_of_tasks){
                $this->set_task_text($_POST["task_text$i"]);
                $this->set_task_position($_POST["tasktype$i"]);
                $this->set_task_date($_POST["date$i"]);
                $this->insert();
                

                $i++;
            }        
            $data['datas'] = $this->display();
            $data['todo_num'] = $this->stats('todo',$_SESSION['id']);
            $data['doing_num'] = $this->stats('doing',$_SESSION['id']);
            $data['done_num'] = $this->stats('done',$_SESSION['id']);
        }else{
                $this->set_task_text($_POST['task_text1']);

                $this->set_task_position($_POST['tasktype1']);
                $this->set_task_date($_POST['date1']);
                $this->insert();
                $data['todo_num'] = $this->stats('todo',$_SESSION['id']);
                $data['doing_num'] = $this->stats('doing',$_SESSION['id']);
                $data['done_num'] = $this->stats('done',$_SESSION['id']);
            }
        }
        
        // $dragdata = json_decode(file_get_contents('../public/assets/js/script.js'),true);
        // if (!empty($dragdata['id'])){
        //     var_dump($dragdata);
        //     die;
        // }

        // if(isset($_POST['save1'])){
        //     // $this->set_task_text($_POST['task_text']);
        //     // $this->set_task_position($_POST['hideninput']);
        //     // $this->insert();
        //     // $data['datas'] = $this->display();
        //     die;
        // }
       
    }
    view::load('board',$data);
}

    
    // public function add(){
    //     if(isset($_POST['save'])){
    //         var_dump($_POST['task_text']);
    //         $this->insert();
    //         $data['datas'] = $this->display();
    //     }

    // }
}

?>