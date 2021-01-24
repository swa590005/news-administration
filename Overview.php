<?php
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
                <input type="hidden" name="editId" value="<?php echo $newsrecord['id']; ?>">
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
