<?php
    require_once "./controller/UserController.php";

    $userController = new UserController();

    switch($_SERVER["REQUEST_METHOD"])
    {
        case 'POST':
            if($_SERVER['REQUEST_URI']=='/User')
            {
                $userController->sendUser();
            }
    }




?>