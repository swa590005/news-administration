<?php
include('header.php');
include('footer.php');



$newsCrudObj = new NewsCrud();

?>

    <div id="results" >
        <div class="container">
        <div class="page-header">
                <h1>News Details</h1>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>SI.No</th>
                        <th>Headline</th>
                        <th>CreationDate</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $newsrecords = $newsCrudObj->displayData(); 
                    foreach ($newsrecords as $newsrecord) {
                    ?>
                        <tr>
                            <td><?php echo $newsrecord['id'] ?></td>
                            <td><a href="Detailpage.php?editId=<?php echo $newsrecord['id'] ?>"><?php echo $newsrecord['headline'] ?></a></td>
                            <td><?php echo $newsrecord['createddate'] ?></td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

