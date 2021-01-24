<?php

require __DIR__.'/config.php';
Session::checkSession();
if(isset($_GET['action']) && $_GET['action']=="logout"){
    Session::destroy();
}
$newsCrudObj = new NewsCrud();

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
                    <a class="nav-link" href="?action=logout">Logout <span class="sr-only">(current)</span></a>
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
    <div id="results" >
        <div class="container">
        <div class="page-header">
                <h1>News Details</h1>
            </div>
            <table class="table table-hover">
                <caption><i class="fa fa-rocket"></i> These ships are ready for their next Mission</caption>
                <thead>
                    <tr>
                        <th>SI.No</th>
                        <th>Headline</th>
                        <th>CreationDate</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $newsrecords = $newsCrudObj->displayData(); 
                    foreach ($newsrecords as $newsrecord) {
                    ?>
                        <tr>
                            <td><?php echo $newsrecord['id'] ?></td>
                            <td><a href="Detailpage.php?editId=<?php echo $newsrecord['id'] ?>"><?php echo $newsrecord['headline'] ?></a></td>
                            <td><?php echo $newsrecord['createddate'] ?></td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        </div>
    </body>
</html>

