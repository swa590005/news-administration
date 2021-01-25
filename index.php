<?php
require __DIR__.'/config.php';
ob_start();
include('header.php');
include('footer.php');

$container= new Container($configuration);
$userObj=$container->getNewsLoader();

if(isset($_POST['register'])){
    $username=$_POST['username'];
        $useremail=$_POST['useremail'];
        $userpassword=$_POST['userpassword'];
        if ($username!='' && $useremail!='' && $userpassword!='') {

            $_POST['userpassword']=sha1($userpassword);
            $response=$userObj->UserRegister($_POST);
            if(!$response){
                $error="Could not Register User";
            }
        }else{
            $error="Please fill in the details";
        }
}

?>

    <div class="container">

    <form class="form-horizontal" action="index.php" method="POST">
        <fieldset>
            <div class="register-user p-0 col-md-6">
                REGISTER USER
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="username" class="col-lg-2 col-form-label">Username</label>
                        <div class="col-lg-10">
                            <input type="text" name="username" placeholder="Username" class="form-control" >
                        </div>
                        <label for="useremail" class="col-lg-2 col-form-label">Useremail</label>
                        <div class="col-lg-10">
                            <input type="email" name="useremail" placeholder="Email" class="form-control" >
                        </div>
                        <label for="userpassword" class="col-lg-2 col-form-label">Password</label>
                        <div class="col-lg-10">
                            <input type="password" name="userpassword" placeholder="Password" class="form-control" >
                        </div>
                        <div class="col-lg-10 pt-3">
                            <button type="submit" name="register" class="btn btn-primary">Register</button>
                            <button type="reset" class="btn btn-primary">Cancel</button>
                        </div>
                        <div class="col-lg-10 pt-3">
                        <?php if(isset($_POST['register'])):?>
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
