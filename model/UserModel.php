<?php
require_once __DIR__ . '/../config/db.php';

Class UserModel{
    private $conn;
    private $table='users';

    public function __construct(){
        $db=new Database();
        $conn=$db->connect();
    }

    public function GetAll(){
        try{
        $query=$this->conn->prepare("SELECT * FROM {$this->table}");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e)
        {
            error_log("DB error".$e->getMessage());
        }
    }
    public function GetById($id){
        try{
            $query=$this->conn->prepare("SELECT * FROM {$this->table} WHERE id=?");
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
        catch(PDOException $e){
            error_log("Database error: " . $e->getMessage());
            return false; 
        }
    }

     public function addUser($data){
        try{
    
        $query=$this->conn->prepare("INSERT INTO {$this->table} ( first_name, last_name, email, company_name, contact_number, role_description, topic_of_discussion,message)
        VALUES(?,?,?,?,?,?,?,?)");
        $query->execute($data['FirstName'],$data['LastName'],$data['email'],$data['CompanyName'],$data['ContactNumber'],$data['RoleDescription'],$data['TopicDisscusion'],$data['Message']);
        return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e)
        {
            error_log("DB error".$e->getMessage());
        }
    }

}

?>