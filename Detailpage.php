<?php
require __DIR__.'/config.php';

$newsCrudObj = new NewsCrud();

if(isset($_GET['editId'])){
    $id=$_GET['editId'];
    
    $newsrecords = $newsCrudObj->displyaRecordById($id); 
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
  
  <h2>View Records</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Headline</th>
        <th>Content</th>
        <th>Created Date</th>
      </tr>
    </thead>
    <tbody>
        
            <tr>
            <td><?php echo $newsrecords['id'] ?></td>
            <td><?php echo $newsrecords['headline'] ?></td>
            <td><?php echo $newsrecords['content'] ?></td>
            <td><?php echo $newsrecords['createddate'] ?></td>
            </tr>
      
    </tbody>
  </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
