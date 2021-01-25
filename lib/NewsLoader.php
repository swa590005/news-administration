<?php

class NewsLoader
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    private function getPDO()
    {
        return $this->pdo;
    }

    // Insert user data 
    public function UserRegister($post)
    {
        
            $pdo=$this->getPDO();
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
        
        $pdo=$this->getPDO();
        $statement=$pdo->prepare('Select * from user where useremail = :useremail && userpassword=:userpassword');
        $statement->execute(array('useremail' => $_POST['useremail'], 
                                    'userpassword'=> $_POST['userpassword']));
        $userArray = $statement->fetchAll(\PDO ::FETCH_ASSOC);

        return $userArray;
    }


    /**
     * Undocumented function
     *
     * @return news[]
     */
    public function getNews()
    {       
        $newslist = array();
            $newsDatas=$this->queryForNews();
            foreach($newsDatas as $newsData)
            { 
                $newslist[] =$this->createNewsFromData($newsData);
            }
        return $newslist;
            
    }

    public function findOneById($id)
    {
        
        $pdo=$this->getPDO();
        $statement=$pdo->prepare('Select * from news_properties where id = :id');
        $statement->execute(array('id' => $id));
        $newsArray = $statement->fetch(\PDO ::FETCH_ASSOC);//to return one row and prevent sql injection
        $newslist = array();
        return $newslist = $this->createNewsFromData($newsArray);
    }
    //returns object
    private function createNewsFromData(array $newsData)
    {
        $news= new News($newsData['headline'],$newsData['content']);
        $news->setId($newsData['id']);
        $news->setNewsDatetime($newsData['createddate']);
        $news->setActiveFlag($newsData['activeflag']);
        return $news;
    }
    private function queryForNews()
    {
        
        $pdo=$this->getPDO();
        $statement=$pdo->prepare('Select * from news_properties');
        $statement->execute();
        $newsArray = $statement->fetchAll(\PDO ::FETCH_ASSOC);

        return $newsArray;
    }
    
    


}


?>
