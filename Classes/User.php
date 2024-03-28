<?php
    include("database.php");
    session_start();

class User {
    private $username;
    private $password;

    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
    }

    public function register(){
        global $conn; // Declare $conn as global
        
        $hash = password_hash($this->password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (user,password) VALUES ('$this->username','$hash')";

        try{
            mysqli_query($conn, $sql);
            echo"You are now registered";

            $_SESSION["username"] = $this->username;

            header("Location: index.html");
        }
        catch(mysqli_sql_exception){
            echo"Could not register user";
        }
    }

    public function login(){
        global $conn;
        $sql = "SELECT * FROM users WHERE user = '$this->username'";
        $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_assoc($result);
                if(password_verify($this->password, $row["password"])){
                    $_SESSION["username"] = $this->username;

                    header("Location: index.html");
                } 
                else {
                    echo "Incorrect password";
                }
            }
            else{
                echo"No user found";
            }
    }
}
