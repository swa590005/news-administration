<?php
include('header.php');
include('footer.php');

$newsCrudObj = new NewsCrud();

if(isset($_POST['register'])){
    $newsCrudObj->UserRegister($_POST);
}

?>

    <div class="container">
        <form class="form-horizontal" action="/Register.php" method="POST">
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
        </form>
    </div>
