<?php
Session::checkSession();
?> 
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
           <meta name="viewport" content="width=device-width, initial-scale=1">
           <title>News Administration</title>

           <!-- Bootstrap -->
           <link rel="stylesheet" type=text/css href="../css/bootstrap.css"/>
           <link rel="stylesheet" type=text/css href="../css/style.css"/>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="col-lg-10">
        <?php if(Session::get('userrole')!=''):?>
            <a class="navbar-brand" href="userDashboard.php" style="color:#fff;">News Administration</a>
        <?php else:?>
            <a class="navbar-brand" href="#" style="color:#fff;">News Administration</a>
        <?php endif;?>
        </div>
        <div class="col-lg-2" style="margin-top:8px">
            <div class="btn-group">            
            <a  href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
            aria-expanded="false">
            Settings
            <span class="caret"></span>
        </a> 
        <ul class="dropdown-menu p-3">
        <?php $login_url='http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];?>
            <?php if($login_url=='http://localhost/index.php'):?>
                <li ><a href="../views/Login.php">Login</a></li>
            <?php elseif(Session::get('userrole')==1):?>
                <li ><a href="../views/overview.php">Dashboard</a></li>
                <li ><a href="../views/createnews.php">Create News</a></li>
                <li ><a href="../views/logout.php">Logout</a></li>
            <?php elseif((Session::get('userrole')==0) && (isset($_SESSION['userid']))):?>
                <li ><a href="../views/logout.php">Logout</a></li>
            <?php else:?>
                <li ><a href="../index.php">Register</a></li>
            <?php endif;?>
        </ul>
            </div>
        </div>
  
    </nav>

