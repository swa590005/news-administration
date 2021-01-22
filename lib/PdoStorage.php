<?php

class PdoStorage
{
    

    public function UserRegister($username, $useremail, $userpassword)
    {
        $pdo = $this->pdo;
        $sql = "INSERT INTO users (username, useremail, userpassword) VALUES (?,?,?)";
        $statement= $pdo->prepare($sql);
        $statement->execute([$username, $useremail, $userpassword]);
    }
}
