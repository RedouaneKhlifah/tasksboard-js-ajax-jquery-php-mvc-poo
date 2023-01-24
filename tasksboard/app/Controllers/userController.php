<?php 

class userController extends user_methods {
    public function login(){
        $data['validate'] = "";
        if(isset($_POST['login'])){


        if(empty($_POST['email']) or empty($_POST['password'])){
            $data['validate'] = "please fill all inputs";
        }
        else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $data['validate'] = "please entre valide email adress";
        }
        else {
            $this->set_email($_POST['email']);
            $this->set_password($_POST['password']);

    
            if ($this->login_method()){
                $id  = $this->login_method();
                $_SESSION['id'] = $id;
                header("location:http://trelly/Tasksbroard/tasks");
            }else {
                $data['validate'] = "incorrect email or password";
            }
            
        }
        }




        View::load('login',$data);
    }

    public function signup(){
        $data['validate'] = "";
        $data['color'] = '';
        $data['show'] = '';
        if(isset($_POST['signup'])){

            if(empty($_POST['email']) or empty($_POST['password'])){
                $data['validate'] = "Please fill all inputs";
                $data['color'] = 'text-danger';
            }
            else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $data['validate'] = "Please entre valide email adress";
                $data['color'] = 'text-danger';
                $data['show'] = 1;
            }else {
                $this->set_email($_POST['email']);
                if ($this->validat_email() > 0){
                    $data['validate'] = "That email already registerd back to";
                    $data['color'] = 'text-danger';
                   
                }else {
                $this->set_password($_POST['password']);
                $this->set_firstname($_POST['firstname']);
                $this->set_lastname($_POST['lastname']);
                $this->signup_method();

                $data['validate'] = "Signup succefully back to";
                $data['color'] = 'text-success';
                $data['show'] = 1;}
            }



        // // die;
    }

        View::load('signup',$data);
    }

}

?>