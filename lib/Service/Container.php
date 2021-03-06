<?php

class Container
{
    private $configuration;
    private $pdo;
    private $newsLoader;
    private $newsStorage;
    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
    }
    /**
     * @return PDO
     */
    public function getPDO()
    {
        if($this->pdo === null){
            $this->pdo = new PDO(
                $this->configuration['db_dsn'],
                $this->configuration['db_user'],
                $this->configuration['db_pass']
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        
        return $this->pdo;
    }
    /**
     * Undocumented function
     *
     * @return NewsLoader
     */
    public function getNewsLoader(){
        if($this->newsLoader=== null)
        {
            $this->newsLoader=new NewsLoader($this->getNewsStorage());
        }
        return $this->newsLoader;
    }
    /**
     * Undocumented function
     *
     * @return PdoNewsStorage
     */
    public function getNewsStorage(){
        if($this->newsStorage=== null)
        {
            $this->newsStorage=new PdoNewsStorage($this->getPDO());
        }
        return $this->newsStorage;
    }

}
