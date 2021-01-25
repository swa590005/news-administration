<?php
ob_start();
require __DIR__.'/config.php';
Session::checkSession();
if(Session::get('userrole')==1){
    Session::destroy();
}
include('header.php');
include('footer.php');

$update = false;
$newsLoader = new NewsLoader();

  // Insert Record 
  if(isset($_POST['createNews'])) {
    
    if (isset($_POST['activeflag']) && ($_POST['activeflag'] == "1")) {
        $_POST['activeflag']=1;
       } else {
        $_POST['activeflag']=0;
       }
    $newsCrudObj->insertData($_POST);
  }

  //editing this

  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
        $editId = $_GET['editId'];
        $update = true;
        $newsrecords = $newsLoader->findOneById($editId);
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
        <?php if ($update == true): ?>
           <h2 class="create-news-headline">Update News</h2>
        <?php else: ?>
	        <h2 class="create-news-headline">Create News</h2>
        <?php endif ?>
        <form class="form-horizontal" action="Createnews.php" method="POST">
        <div class="form-group">
            <label for="headline">Headline</label>
            <input value="<?php echo $newsrecords->getNewsHeadline(); ?>" type="text" name="headline" class="form-control" placeholder="Enter headline">
        </div>
        <div class="form-group">
            <label for="content">content</label>
            <textarea type="text" name="content" class="form-control" placeholder="Enter content">
                <?php echo $newsrecords->getNewsContent(); ?>    
            </textarea>
        </div>
        
        <div class="form-check">
            <?php 
                if($newsrecords->getActiveFlag())
                {
            ?>
                  <input type="checkbox" class="form-check-input" checked=true name="activeflag" value="1">
            <?php
                }else{
            ?>     
                  <input type="checkbox" class="form-check-input" name="activeflag" value="1">
            <?php } ?>
            
            <label class="form-check-label"  for="activeflag">Make News Active</label>
        </div>
        

        <?php if ($update == true): ?>
            
            <input type="hidden" name="newsId" value="<?php echo $newsrecords->getId(); ?>">
	        <button type="submit" name="updateNews" class="btn btn-primary">Update News</button>
        <?php else: ?>
	        <button type="submit" name="createNews" class="btn btn-primary">Create News</button>
        <?php endif ?>

        </form>
    </div>
