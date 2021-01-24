<?php
require __DIR__.'/config.php';
ob_start();
include('header.php');
include('footer.php');

$newsCrudObj = new NewsCrud();

if(isset($_POST['register'])){
    $newsCrudObj->UserRegister($_POST);
}

?>

    <div class="container">

    <form class="form-horizontal" action="Register.php" method="POST">
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
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
        <!--<form class="form-horizontal" action="/Register.php" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">User Name</label>
            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="useremail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="userpassword" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        
        <button type="submit" name="register" class="btn btn-primary">Register</button>
        </form>-->
    </div>
