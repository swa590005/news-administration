<?php
ob_start();
require __DIR__.'/../config.php';

$container= new Container($configuration);
$newsLoader=$container->getNewsLoader();

//load news data
$newLists= $newsLoader->getNews();

// Delete record from table
if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $result=$newsLoader->removeSingleNews($deleteId);
       if ($result==true) {
        header("Location:./adminDashboard.php?msg3=delete");
       }
}
?> 
<?php require '../layout/header.php'; ?>   
<div class="container">
  <?php
    if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Data added successfully
            </div>";
      } 
    if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Data updated successfully
            </div>";
    }
    if (isset($_GET['msg3']) == "delete") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Data deleted successfully
            </div>";
    }
  ?>
  <h2 class="overview-headline">All Available News</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>SI.No</th>
        <th>Headline</th>
        <th>Content</th>
        <th>Datetime</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          $i=1; 
          foreach ($newLists as $newsrecord) {
        ?>
            <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $newsrecord->getNewsHeadline(); ?></td>
            <td><?php echo $newsrecord->getNewsContent(); ?></td>
            <td><?php echo $newsrecord->getNewsDatetime(); ?></td>
              <?php 
                if($newsrecord->getActiveFlag())
                {
              ?>
                  <td>active</td>
              <?php
                }else{
              ?>     
                  <td>inactive</td>
            <?php } ?>
            <td>
                <button>
                  <a href="./createNews.php?editId=<?php echo $newsrecord->getId(); ?>" style="color:green">
                    Edit
                  </a>
                </button>
                <button>
                  <a href="./adminDashboard.php?deleteId=<?php echo $newsrecord->getId(); ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">  
                    Delete
                  </a>
                </button>
            </td>
            </tr>
        <?php } ?>
    </tbody>
  </table>
  <a href="./createNews.php" class="btn btn-primary">Add New Record</a>
  <a href="./userDashboard.php"><p class="text-center"><i class="fa fa-undo"></i> Back to News</p></a>
</div>
<?php require '../layout/footer.php'; ?>   
