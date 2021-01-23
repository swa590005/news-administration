<?php
require __DIR__.'/config.php';

$newsCrudObj = new NewsCrud();
// Delete record from table
if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $newsCrudObj->deleteRecord($deleteId);
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
  <?php
    if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration added successfully
            </div>";
      } 
    if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration updated successfully
            </div>";
    }
    if (isset($_GET['msg3']) == "delete") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Record deleted successfully
            </div>";
    }
  ?>
  <h2>View Records
    <a href="Createnews.php" class="btn btn-primary" style="float:right;">Add New Record</a>
  </h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Headline</th>
        <th>Content</th>
        <th>Created Date</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          $newsrecords = $newsCrudObj->displayData(); 
          foreach ($newsrecords as $newsrecord) {
        ?>
            <tr>
            <td><?php echo $newsrecord['id'] ?></td>
            <td><?php echo $newsrecord['headline'] ?></td>
            <td><?php echo $newsrecord['content'] ?></td>
            <td><?php echo $newsrecord['createddate'] ?></td>
            <td><?php echo $newsrecord['activeflag'] ?></td>
            <td>
                <a href="Createnews.php?editId=<?php echo $newsrecord['id'] ?>" style="color:green">
                <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
                <a href="Overview.php?deleteId=<?php echo $newsrecord['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
                <i class="fa fa-trash" aria-hidden="true"></i>
                </a>
            </td>
            </tr>
        <?php } ?>
    </tbody>
  </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
