<?php
    include("../database.php");
    session_start();

class Employee {
    private $first_name;
    private $last_name;
    private $email;
    private $birthday;
    private $address;
    private $department_id;
    private $position;
    private $salary;
    private $manager_id;
    private $status;
    public function __construct($first_name, $last_name, $email, $birthday, $address, $department_id, $position, $salary, $manager_id, $status) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->birthday = $birthday;
        $this->address = $address;
        $this->department_id = $department_id;
        $this->position = $position;
        $this->salary = $salary;
        $this->manager_id = $manager_id;
        $this->status = $status;
    }

    public function add_employee(){
        global $conn; // Declare $conn as global

        $sql = "INSERT INTO employees (first_name,last_name,email,birthday,address,department_id,position,salary,manager_id,status) 
                VALUES ('$this->first_name','$this->last_name','$this->email','$this->birthday','$this->address','$this->department_id','$this->position','$this->salary','$this->manager_id','$this->status')";

        try{
            mysqli_query($conn, $sql);
            echo"Employee added";
        }
        catch(mysqli_sql_exception){
            echo"Could not add employee";
        }
    }

    public function search_employee(){
        global $conn;
        $sql = "SELECT * FROM employees WHERE first_name = '$this->first_name' AND last_name = '$this->last_name'";
        return mysqli_query($conn, $sql);
    }
    
}