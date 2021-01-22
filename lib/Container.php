<?php

class Container
{
    
    public function UserRegister($username, $useremail, $userpassword)
    {

        $pdo = new PDO('mysql:host=localhost;dbname=news_db', 'root','password');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO user (username, useremail, userpassword,userrole) VALUES (?,?,?,?)";
        $statement= $pdo->prepare($sql);
        $result=$statement->execute([$username, $useremail, $userpassword,0]);
        return $result;
    }

}
