<?php

class PdoNewsStorage
{
    private $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo=$pdo;
    }

    public function insertNewsData($post)
    {
        $pdo=$this->pdo;
        $sql = "INSERT INTO news_properties (headline, content, activeflag) VALUES (?,?,?)";
        $statement= $pdo->prepare($sql);
        $result=$statement->execute([trim($_POST['headline']), 
                                        trim($_POST['content']),$_POST['activeflag'] ]);
        return $result;
            
    }

    public function updateNewsData($post)
    {
        $pdo=$this->pdo;
        
        $sql = "UPDATE news_properties SET headline = :headline, 
            content = :content, 
            activeflag = :activeflag 
            WHERE id = :newsId";
        $statement = $pdo->prepare($sql);                                  
        $statement->bindParam(':headline', trim($_POST['headline']), PDO::PARAM_STR);       
        $statement->bindParam(':content', trim($_POST['content']), PDO::PARAM_STR);    
        $statement->bindParam(':activeflag', $_POST['activeflag'], PDO::PARAM_STR);  
        $statement->bindParam(':newsId', $_POST['newsId'], PDO::PARAM_INT);   
        $result=$statement->execute();
        
        return $result;
            
    }
    public function deleteSingleNewsData($id)
    {
        $pdo=$this->pdo;
        $statement=$pdo->prepare('delete from news_properties where id = :id');
        $result=$statement->execute(array('id' => $id));
        return $result;
            
    }
    public function fetchAllNewsData()
    {
        $pdo=$this->pdo;
        $statement=$pdo->prepare('Select * from news_properties');
        $statement->execute();
        $newsArray = $statement->fetchAll(\PDO ::FETCH_ASSOC);

        return $newsArray;
    }

    public function fetchSingleNewsData($id)
    {
        $pdo=$this->pdo;
        $statement=$pdo->prepare('Select * from news_properties where id = :id');
        $statement->execute(array('id' => $id));
        $newsArray = $statement->fetch(\PDO ::FETCH_ASSOC);//to return one row and prevent sql injection
        if (!$newsArray) {
            return null;
        }
        return $newsArray;
    }

    public function insertUserData($post)
    {
        
            $pdo=$this->pdo;
            $sql = "INSERT INTO user (username, useremail, userpassword,userrole) VALUES (?,?,?,?)";
            $statement= $pdo->prepare($sql);
            $result=$statement->execute([$_POST['username'], $_POST['useremail'], $_POST['userpassword'],0]);
            return $result;
            
    }
    public function fetchLoginUserData($post)
    {
        $pdo=$this->pdo;
        $statement=$pdo->prepare('Select * from user where useremail = :useremail && userpassword=:userpassword');
        $statement->execute(array('useremail' => $_POST['useremail'], 
                                    'userpassword'=> $_POST['userpassword']));
        $result = $statement->fetchAll(\PDO ::FETCH_ASSOC);

        return $result;
            
    }

}
