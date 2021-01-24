<?php
//echo $login_url='http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];die;
//Session::checkSession();
//if(isset($_GET['action']) && $_GET['action']=="logout"){
    //Session::destroy();
//}
?> 
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
           <meta name="viewport" content="width=device-width, initial-scale=1">
           <title>News Administration</title>

           <!-- Bootstrap 
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">-->
           <link rel="stylesheet" type=text/css href="css/bootstrap.css"/>
           <link rel="stylesheet" type=text/css href="css/style.css"/>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="col-lg-10">
            <a class="navbar-brand" href="#" style="color:#fff;">News Administration</a>
        </div>
        <div class="col-lg-2" style="margin-top:8px">
            <div class="btn-group">
            <a  href="#" class="btn btn-primary">Settings</a> 
            <a  href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
            aria-expanded="false">
            <span class="caret"></span>
        </a> 
        <ul class="dropdown-menu">
        <?php $login_url='http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];?>
            <?php if($login_url=='http://localhost/index.php'):?>
                <li ><a href="login.php">Login</a></li>
            <?php elseif(Session::get('userrole')=='0'):?>
                <li ><a href="overview.php">Dashboard</a></li>
                <li ><a href="createnews.php">Create News</a></li>
                <li ><a href="logout.php">Logout</a></li>
            <?php else:?>
                <li ><a href="index.php">Register</a></li>
            <?php endif;?>
        </ul>
            </div>
        </div>
  
    </nav>

