<?php
    include("database.php");

class User {
    private $username;
    private $password;

    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
    }

    public function register(){
        global $conn; // Declare $conn as global
        if(empty($this->username)){
            echo"Please enter a username";
        }
        elseif(empty($this->password)){
            echo"Please enter a password";
        }
        else{
            $hash = password_hash($this->password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (user,password) VALUES ('$this->username','$hash')";
            try{
                mysqli_query($conn, $sql);
                echo"You are now registered";
            }
            catch(mysqli_sql_exception){
                echo"Could not register user";
            }
        }
    }
}
