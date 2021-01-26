<?php
ob_start();
require __DIR__.'/../config.php';

$container= new Container($configuration);
$newsLoader=$container->getNewsLoader();

  // Insert Record 
  if(isset($_POST['createNews'])) {
    if ($_POST['headline'] !='' &&$_POST['content']!='') {
        if (isset($_POST['activeflag']) && ($_POST['activeflag'] == "1")) {
            $_POST['activeflag']=1;
        } else {
            $_POST['activeflag']=0;
        }
        $result=$newsLoader->createNews($_POST);
        if ($result==true) {
            header("Location:./adminDashboard.php?msg1=insert");
        }
    }else{
        $error="Please fill in Details";
    }
  }

  
  // Update Record 
  if(isset($_POST['updateNews'])) {
      
    if ($_POST['headline'] !='' &&$_POST['content']!='') {
        
        if (isset($_POST['activeflag']) && ($_POST['activeflag'] == "1")) {
            $_POST['activeflag']=1;
        } else {
            $_POST['activeflag']=0;
        }
        
        $result=$newsLoader->editNews($_POST);
        if ($result==true) {
            header("Location:./adminDashboard.php?msg2=update");
        }
    }else{
        $error="Please fill in Details";
    }
  }
  if(isset($_POST['cancel'])){
    header("Location:./adminDashboard.php");
  } 
 
?>
<?php require '../layout/header.php'; ?>   
            <?php 
                if(isset($_GET['editId']) && !empty($_GET['editId'])) 
                {
                    $editId = $_GET['editId'];
                    $newsrecords = $newsLoader->findOneById($editId);
            ?>      <div class="container">
                        <h2 class="create-news-headline">Update News</h2>
                        
                        <form class="form-horizontal" action="createNews.php" method="POST">
                        <div class="form-group">
                            <label for="headline">Headline</label>
                            <input value="<?php echo $newsrecords->getNewsHeadline(); ?>" type="text" name="headline" class="form-control" placeholder="Enter headline">
                        </div>
                        <div class="form-group">
                            <label for="content">content</label>
                            <textarea type="text" name="content" class="form-control" placeholder="Enter content"><?php echo $newsrecords->getNewsContent(); ?></textarea>
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
                            <input type="hidden" name="newsId" value="<?php echo $newsrecords->getId(); ?>">
                            <button type="submit" name="updateNews" class="btn btn-primary">Update News</button>
                            <button type="submit" name="cancel" class="btn btn-primary">Cancel</button>
                        </form>
                        <div class="col-lg-10 pt-3">
                        <?php if(isset($_POST['updateNews'])):?>
                            <div class="alert alert-dismissable alert-warning p-1">
                                <p><?php echo $error; ?></p>
                            </div>
                        <?php endif;?>
                        </div>
                    </div>
            <?php
                }else{
            ?>     
                    <div class="container">
                        <h2 class="create-news-headline">Create News</h2>
                        <form class="form-horizontal" action="createNews.php" method="POST">
                        <div class="form-group">
                            <label for="headline">Headline</label>
                            <input  type="text" name="headline" class="form-control" placeholder="Enter headline">
                        </div>
                        <div class="form-group">
                            <label for="content">content</label>
                            <textarea type="text" name="content" class="form-control" placeholder="Enter content"></textarea>
                        </div>
                        
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="activeflag" value="1">
                            <label class="form-check-label"  for="activeflag">Make News Active</label>
                        </div>
                            <button type="submit" name="createNews" class="btn btn-primary">Create News</button>
                            <button type="submit" name="cancel" class="btn btn-primary">Cancel</button>
                        </form>
                        <div class="col-lg-10 pt-3">
                        <?php if(isset($_POST['createNews'])):?>
                            <div class="alert alert-dismissable alert-warning p-1">
                                <p><?php echo $error; ?></p>
                            </div>
                        <?php endif;?>
                        </div>
                    </div>
            <?php } ?>
<?php require '../layout/footer.php'; ?>
            
       
    
