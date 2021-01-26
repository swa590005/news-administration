<?php
//require __DIR__.'/vendor/autoload.php';


require_once __DIR__.'/lib/Model/Session.php';
require_once __DIR__.'/lib/Model/News.php';
require_once __DIR__.'/lib/Service/PdoNewsStorage.php';
require_once __DIR__.'/lib/Service/NewsLoader.php';
require_once __DIR__.'/lib/Service/Container.php';


$configuration = array(
        'db_dsn'=> 'mysql:host=localhost;port=8000;dbname=news_db',
        'db_user'=>'root',
        'db_pass'=>'password'
);


