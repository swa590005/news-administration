<?php
ob_start();
require __DIR__.'/config.php';
Session::checkSession();
if(Session::get('userrole')==1){
  Session::destroy();
}
include('header.php');
include('footer.php');

$newsCrudObj = new NewsCrud();
// Delete record from table
if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $newsCrudObj->deleteRecord($deleteId);
}
?> 

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
        <th>Id</th>
        <th>Headline</th>
        <th>Content</th>
        <th>Created Date</th>
        <th>Status</th>
        <th>Actions</th>
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
            <td><?php echo date('d-m-Y',strtotime($newsrecord['createddate'])); ?></td>
              <?php 
                if($newsrecord['activeflag']==1)
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
                  <a href="Createnews.php?editId=<?php echo $newsrecord['id'] ?>" style="color:green">
                    Edit
                  </a>
                </button>
                <button>
                  <a href="Overview.php?deleteId=<?php echo $newsrecord['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">  
                    Delete
                  </a>
                </button>
            </td>
            </tr>
        <?php } ?>
    </tbody>
  </table>
  <a href="Createnews.php" class="btn btn-primary">Add New Record</a>
</div>
