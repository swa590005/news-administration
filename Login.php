<?php
require __DIR__.'/config.php';

Session::init();
$newsCrudObj=new NewsCrud();

if(isset($_POST['login'])){
    $useremail=$_POST['useremail'];
    $userpassword=$_POST['userpassword'];
    if($useremail!='' && $userpassword!='')
    {   
        $response=$newsCrudObj->UserLogin($_POST);
        if($response){
            Session::set('login',true);
            foreach ($response as $userrecord) {
                Session::set('useremail',$userrecord['useremail']);
                Session::set('userid',$userrecord['id']);
            }
            header("Location:index.php");
        }else{
            echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              wrong details
            </div>";
        }
        
    }else{
        echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Please fill details
            </div>";
        
    }
}

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
           <meta name="viewport" content="width=device-width, initial-scale=1">
           <title>News Administration</title>

           <!-- Bootstrap -->
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
           
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="/index.php">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li>
                    <a class="nav-link" href="Register.php">Register <span class="sr-only">(current)</span></a>
                </li>
                <li>
                    <a class="nav-link" href="Login.php">Login <span class="sr-only">(current)</span></a>
                </li>
                <li>
                    <a class="nav-link" href="Overview.php">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li>
                    <a class="nav-link" href="Createnews.php">Create News <span class="sr-only">(current)</span></a>
                </li>
                
      </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <form class="form-horizontal" action="/Login.php" method="POST">
        
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="useremail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="userpassword" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        
        <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
    </div>
    </body>
</html>
