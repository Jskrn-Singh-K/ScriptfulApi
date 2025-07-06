<?php
require_once __DIR__.'/../model/UserModel.php';

Class UserController{
    private $model;

    function __construct()
    {
        $this->model=new UserModel();
    }

    function show($id)
    {
        $user = $this->model->GetById($id);
        if($user)
        {
            include '';
        }
        else{
            echo "No user Found";
        }
    }
    function sendUser(){
        if($_SERVER["REQUEST_METHOD"]=='POST')
        {

        $data=[
            'FirstName'=>$_POST['FirstName'],
            'LastName'=>$_POST['LastName'],
            'email'=>$_POST['email'],
            'CompanyName'=>$_POST['CompanyName'],
            'ContactNumber'=>$_POST['ContactNumber'],
            'RoleDescription'=>$_POST['RoleDescription'],
            'TopicDisscusion'=>$_POST['Topicdisscusion'],
            'Message'=>$_POST['Message']
        ];
        if($this->model->addUser($data))
        {
            echo "User Added successfully";
        }
        else{
            echo "User cannot be added";
        }   
    }

    }
}

?>