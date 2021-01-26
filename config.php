<?php
//require __DIR__.'/vendor/autoload.php';


require_once __DIR__.'/lib/Session.php';
require_once __DIR__.'/lib/News.php';
require_once __DIR__.'/lib/PdoNewsStorage.php';
require_once __DIR__.'/lib/NewsLoader.php';
require_once __DIR__.'/lib/NewsCrud.php';
require_once __DIR__.'/lib/Container.php';





$configuration = array(
        'db_dsn'=> 'mysql:host=localhost;port=8000;dbname=news_db',
        'db_user'=>'root',
        'db_pass'=>'password'
);


