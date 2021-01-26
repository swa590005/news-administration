<?php
ob_start();
require __DIR__.'/../config.php';
Session::checkSession();

$container= new Container($configuration);
$newsLoader=$container->getNewsLoader();


//load news data
$newLists= $newsLoader->getNews();
$i=1;
?>
<?php require '../layout/header.php'; ?>   
    <div id="results" >
        <div class="container">
        <div class="page-header">
                <h1>News</h1>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>SI.No</th>
                        <th>Headline</th>
                        <th>Datetime</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($newLists as $newsrecord): ?>
                    <?php if($newsrecord->getActiveFlag()) : ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><a href="./detailPage.php?editId=<?php echo $newsrecord->getId(); ?>"><?php echo $newsrecord->getNewsHeadline(); ?></a></td>
                            <td><?php echo $newsrecord->getNewsDatetime();?></td>
                        </tr>
                    <?php endif ;?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php require '../layout/footer.php'; ?>   
