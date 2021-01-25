<?php

class User
{
    // Insert user data 
    public function UserRegister($post)
    {
        
            $pdo = new PDO('mysql:host=localhost;dbname=news_db', 'root','password');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO user (username, useremail, userpassword,userrole) VALUES (?,?,?,?)";
            $statement= $pdo->prepare($sql);
            $result=$statement->execute([$_POST['username'], $_POST['useremail'], $_POST['userpassword'],1]);
            if ($result==true) {
                header("Location:Login.php");
            }else{
                return  false;
            }
        
    }

    public function UserLogin($post)
    {
        
        $pdo = new PDO('mysql:host=localhost;dbname=news_db', 'root','password');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement=$pdo->prepare('Select * from user where useremail = :useremail && userpassword=:userpassword');
        $statement->execute(array('useremail' => $_POST['useremail'], 
                                    'userpassword'=> $_POST['userpassword']));
        $userArray = $statement->fetchAll(\PDO ::FETCH_ASSOC);

        return $userArray;
    }

}

?>
