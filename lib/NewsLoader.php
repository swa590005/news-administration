<?php

class NewsLoader
{
    private $newsStorage;

    public function __construct(PdoNewsStorage $newsStorage)
    {
        $this->newsStorage = $newsStorage;
    }
    
    public function createUser($post)
    {
        
        return $result = $this->newsStorage->insertUserData($post); 
        
    }

    public function getLoginUser($post)
    {
        return $result = $this->newsStorage->fetchLoginUserData($post); 
        
    }

    public function createNews($post)
    {
        
        return $result = $this->newsStorage->insertNewsData($post); 
        
    }

    public function editNews($post)
    {
        
        return $result = $this->newsStorage->updateNewsData($post); 
        
    }
    public function removeSingleNews($id)
    {
        
        return $result = $this->newsStorage->deleteSingleNewsData($id); 
        
    }

    public function getNews()
    {       
        $newslist = array();
            $newsDatas=$this->newsStorage->fetchAllNewsData();
            foreach($newsDatas as $newsData)
            { 
                $newslist[] =$this->createNewsFromData($newsData);
            }
        return $newslist;
            
    }

    public function findOneById($id)
    {
        $newsArray=$this->newsStorage->fetchSingleNewsData($id);
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
   
}


?>
