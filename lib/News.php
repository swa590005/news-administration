<?php

class News
{
    private $id;
    private $headline;
    private $content;
    private $newsdatetime;
    private $isactive;

    public function __construct($headline,$content)
    {
        $this->headline = $headline;
        $this->content = $content;
    }

    public function getNewsHeadline() 
    {
        return $this->headline;
    }

    public function getNewsContent()
    {
        return $this->content;
    }
    public function getNewsDatetime()
    {
        return date('d-m-Y',strtotime($this->newsdatetime));
    }
    public function setNewsDatetime($newsdatetime)
    {
        $this->newsdatetime = $newsdatetime;
    }

    public function getActiveFlag()
    {
        return $this->isactive;
    }

    public function setActiveFlag($isactive)
    {
        $this->isactive = $isactive;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    

}

?>
