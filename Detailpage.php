<?php
include('header.php');
include('footer.php');

$newsCrudObj = new NewsCrud();

if(isset($_GET['editId'])){
    $id=$_GET['editId'];
    
    $newsrecords = $newsCrudObj->displyaRecordById($id); 
}

?> 

    <div class="container">
        
        <h2>Details</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Headline</th>
                <th>Content</th>
                <th>Created Date</th>
            </tr>
            </thead>
            <tbody>
                
                    <tr>
                    <td><?php echo $newsrecords['id'] ?></td>
                    <td><?php echo $newsrecords['headline'] ?></td>
                    <td><?php echo $newsrecords['content'] ?></td>
                    <td><?php echo $newsrecords['createddate'] ?></td>
                    </tr>
            
            </tbody>
        </table>
    </div>
    
