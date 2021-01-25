<?php

class NewsLoader
{
    
    public function getNews()
    {       
        $newslist = array();
            $newsDatas=$this->queryForNews();
            foreach($newsDatas as $newsData)
            {
                
                $news= new News($newsData['headline'],$newsData['content']);
                $news->setId($newsData['id']);
                $news->setNewsDatetime($newsData['createddate']);
                $news->setActiveFlag($newsData['activeflag']);
                $newslist[] = $news;
            }
        return $newslist;
            
    }
    private function queryForNews()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=news_db', 'root','password');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement=$pdo->prepare('Select * from news_properties');
        $statement->execute();
        $newsArray = $statement->fetchAll(\PDO ::FETCH_ASSOC);

        return $newsArray;
    }
    
    


}


?>
