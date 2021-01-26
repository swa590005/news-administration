<?php
ob_start();
require __DIR__.'/config.php';
Session::init();

$container= new Container($configuration);
$newsLoader=$container->getNewsLoader();

if(isset($_POST['login'])){
    $useremail=$_POST['useremail'];
    $userpassword=$_POST['userpassword'];
    if($useremail!='' && $userpassword!='')
    {   
        $_POST['userpassword']=sha1($userpassword);
        $response=$newsLoader->getLoginUser($_POST);
        if($response){
            
            Session::set('login',true);
            foreach ($response as $userrecord) {
                Session::set('useremail',$userrecord['useremail']);
                Session::set('userid',$userrecord['id']);
                Session::set('userrole',$userrecord['userrole']);
            }
            header("Location:userDashboard.php");
        }else{
            $error="Useremail or Password incorrect ";
        }
        
    }else{
            $error="Please fill all details";
    }
}else{
    unset($_SESSION['userid']);
    unset($_SESSION['useremail']);
    unset($_SESSION['userrole']);
}
include('header.php');
include('footer.php');
?>

    <div class="container">
    <form class="form-horizontal" action="Login.php" method="POST">
        <fieldset>
            <div class="register-user p-0 col-md-6">
                Login
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                <div class="form-group">
                        <label for="useremail" class="col-lg-2 col-form-label">Useremail</label>
                        <div class="col-lg-10">
                            <input type="email" name="useremail" placeholder="Email" class="form-control" >
                        </div>
                        <label for="userpassword" class="col-lg-2 col-form-label">Password</label>
                        <div class="col-lg-10">
                            <input type="password" name="userpassword" placeholder="Password" class="form-control" >
                        </div>
                        <div class="col-lg-10 pt-3">
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                        </div>
                        <div class="col-lg-10 pt-3">
                        <?php if(isset($_POST['login'])):?>
                            <div class="alert alert-dismissable alert-warning p-1">
                                <p><?php echo $error; ?></p>
                            </div>
                        <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
    </div>
