<?php
    require_once('inc/header.php');
?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Portfolio List</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Portfolio List</h5>
            </div>
            <?php
                if(isset($_SESSION['delete_done'])){ ?>
                    <div class="alert alert-danger" role="alert">
                        <p><?=$_SESSION['delete_done']?></p>
                    </div>
            <?php
                }
                unset($_SESSION['delete_done']);
            ?>
            <div class="card-body">
                <div class="example-container">
                    <div class="example-content">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th>Serial</th>
                                    <th>Portfolio Title</th>
                                    <th>Portfolio Header</th>
                                    <th>Portfolio Description</th>
                                    <th>Portfolio Image</th>
                                    <th>Portfolio Status</th>
                                    <th>Portfolio Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $serial = 1;
                                    $portfolio_query = "SELECT * FROM `portfolio` ORDER BY id DESC";
                                    $portfolio_query_db = mysqli_query($db_connect, $portfolio_query);
                                    
                                    foreach($portfolio_query_db as $portfolio) : ?>
                                    <tr>
                                        <th><?=$serial++?></th>
                                        <td><?=$portfolio['portfolio_title']?></td>
                                        <td><?=$portfolio['portfolio_header']?></td>
                                        <td><?=$portfolio['portfolio_description']?></td>
                                        <td>
                                            <img src="uploads/portfolio_image/<?=$portfolio['portfolio_image']?>" height="100px" width="100px" alt="<?=$portfolio['portfolio_image']?>">
                                        </td>
                                        <td>
                                            <p class="badge <?=($portfolio['portfolio_status'] === 'Active') ? 'badge-success' : 'badge-danger'?>">
                                                <?=$portfolio['portfolio_status']?>        
                                            </p>
                                        </td>
                                        <td>
                                            <a href="portfolio_update.php?id=<?=$portfolio['id']?>" class="btn btn-warning">Edit</a>
                                            <a href="portfolio_delete.php?id=<?=$portfolio['id']?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                    endforeach
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    require_once('inc/footer.php');
?>