<?php
require(MODELS."/connexion.php");
class user_methods extends connection{
    public $email ;
    public $password ;
    public $firstname ;
    public $lastname ;

    public function set_email($email){
        $this->email = $email;
    }
    public function set_password($password){
        $this->password = $password;
    }
    public function set_firstname($firstname){
        $this->firstname = $firstname;
    }
    public function set_lastname($lastname){
        $this->lastname = $lastname;
    }


    public function getrow($email){
        $con =  $this->connect();
        $stmt  = $con-> prepare("SELECT * FROM user where email = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $row = $stmt->get_result();
        $row = mysqli_fetch_assoc($row);
        return $row;
    }



    public function login_method(){
        $con =  $this->connect();
        $row = $this->getrow($this->email);

        if($row != null){
            $pass = $row['password'];
            $password= password_verify($this->password ,$pass );
            if($password){
                return $row['id_user'];
            }else {
                return false;
            }
        }

    }

    public function signup_method(){
        $password= password_hash($this->password ,PASSWORD_DEFAULT );
        $con =  $this->connect();
        $stmt  = $con-> prepare("INSERT INTO user (firstname,lastname,email,`password`) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$this->firstname,$this->lastname, $this->email, $password);
        $stmt->execute();
        // var_dump( $stmt->execute());
        // die;
        $stmt->close();
    }

    public function validat_email(){
        $sql = "SELECT * from user where email = '$this->email' ";
        $req = $this->connect()->query($sql);
        $req = mysqli_num_rows($req);
        return $req;
    }
}