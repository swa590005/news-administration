<?php
require __DIR__.'/config.php';

$newsCrudObj = new NewsCrud();

  // Insert Record in customer table
  if(isset($_POST['createNews'])) {
    $newsCrudObj->insertData($_POST);
  }

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
           <meta name="viewport" content="width=device-width, initial-scale=1">
           <title>News Administration</title>

           <!-- Bootstrap -->
           
            <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
           
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li>
                    <a class="nav-link" href="Register.php">Register <span class="sr-only">(current)</span></a>
                </li>
                <li>
                    <a class="nav-link" href="#">Login <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                    </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
      </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <form class="form-horizontal" action="/Createnews.php" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Headline</label>
            <input type="text" name="headline" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter headline">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">content</label>
            <input type="text" name="content" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter content">
        </div>
        
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" name="activeflag" value=1 for="exampleCheck1">Make News Active</label>
        </div>
        <button type="submit" name="createNews" class="btn btn-primary">Save</button>
        </form>
    </div>
    </body>
</html>
