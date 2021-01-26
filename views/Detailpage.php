<?php
ob_start();
require __DIR__.'/../config.php';
Session::checkSession();

$container= new Container($configuration);
$newsLoader=$container->getNewsLoader();

if(isset($_GET['editId'])){
    $id=$_GET['editId'];
    $i=1;
    $newsrecords = $newsLoader->findOneById($id);
}

?> 
<?php require '../layout/header.php'; ?>   
    <div class="container">
        
        <h2>Details</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>SI.No</th>
                <th>Headline</th>
                <th>Content</th>
                <th>Created Date</th>
            </tr>
            </thead>
            <tbody>
                
                    <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $newsrecords->getNewsHeadline(); ?></td>
                    <td><?php echo $newsrecords->getNewsContent(); ?></td>
                    <td><?php echo $newsrecords->getNewsDatetime(); ?></td>
                    </tr>
            
            </tbody>
        </table>
    </div>
    <a href="./userDashboard.php"><p class="text-center"><i class="fa fa-undo"></i> Back to News</p></a>
<?php require '../layout/footer.php'; ?>      
