<?php
require __DIR__.'/config.php';
include('header.php');
include('footer.php');

$update = false;
$newsCrudObj = new NewsCrud();

  // Insert Record 
  if(isset($_POST['createNews'])) {
    
    if (isset($_POST['activeflag']) && ($_POST['activeflag'] == "1")) {
        $_POST['activeflag']=1;
       } else {
        $_POST['activeflag']=0;
       }
    $newsCrudObj->insertData($_POST);
  }
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
        $editId = $_GET['editId'];
        $update = true;
        $newsrecords = $newsCrudObj->displyaRecordById($editId);
  }
  // Update Record 
  if(isset($_POST['updateNews'])) {
    if (isset($_POST['activeflag']) && ($_POST['activeflag'] == "1")) {
        $_POST['activeflag']=1;
       } else {
        $_POST['activeflag']=0;
       }
    $newsCrudObj->updateRecord($_POST);
  } 

?>

    <div class="container">
        <form class="form-horizontal" action="/Createnews.php" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Headline</label>
            <input value="<?php echo $newsrecords['headline']; ?>" type="text" name="headline" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter headline">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">content</label>
            <input value="<?php echo $newsrecords['content']; ?>" type="text" name="content" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter content">
        </div>
        
        <div class="form-check">
            <?php 
                if($newsrecords['activeflag']==1)
                {
            ?>
                  <input type="checkbox" class="form-check-input" checked=true name="activeflag" value="1">
            <?php
                }else{
            ?>     
                  <input type="checkbox" class="form-check-input" name="activeflag" value="1">
            <?php } ?>
            
            <label class="form-check-label"  for="exampleCheck1">Make News Active</label>
        </div>
        

        <?php if ($update == true): ?>
            
            <input type="hidden" name="newsId" value="<?php echo $newsrecords['id']; ?>">
	        <button type="submit" name="updateNews" class="btn btn-primary">Update</button>
        <?php else: ?>
	        <button type="submit" name="createNews" class="btn btn-primary">Save</button>
        <?php endif ?>

        </form>
    </div>
