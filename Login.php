<?php
include('header.php');
include('footer.php');

$newsCrudObj=new NewsCrud();

if(isset($_POST['login'])){
    $useremail=$_POST['useremail'];
    $userpassword=$_POST['userpassword'];
    if($useremail!='' && $userpassword!='')
    {   
        $response=$newsCrudObj->UserLogin($_POST);
        if($response){
            Session::set('login',true);
            foreach ($response as $userrecord) {
                Session::set('useremail',$userrecord['useremail']);
                Session::set('userid',$userrecord['id']);
                Session::set('userrole',$userrecord['userrole']);
            }
            header("Location:index.php");
        }else{
            echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              wrong details
            </div>";
        }
        
    }else{
        echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Please fill details
            </div>";
        
    }
}

?>

    <div class="container">
        <form class="form-horizontal" action="/Login.php" method="POST">
        
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="useremail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="userpassword" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        
        <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
    </div>
