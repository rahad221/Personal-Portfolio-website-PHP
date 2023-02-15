<?php
    require_once('inc/header.php');
?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Banner List</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Banner List Info</h5>
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
                                    <th>Banner Name</th>
                                    <th>Banner Description</th>
                                    <th>Banner Image</th>
                                    <th>Banner Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $serial = 1;
                                    $banner_query = "SELECT * FROM `banner` ORDER BY id DESC";
                                    $banner_query_db = mysqli_query($db_connect, $banner_query);

                                    foreach($banner_query_db as $banner) :?>
                                        <tr>
                                            <th><?=$serial++?></th>
                                            <td><?=$banner['banner_name']?></td>
                                            <td><?=$banner['banner_descrtiption']?></td>
                                            <td>
                                                <img src="uploads/banner_image/<?=$banner['banner_image']?>" alt="" height="100px" width="100px">
                                            </td>
                                            <td>
                                            <p class="badge <?=($banner['banner_status'] === 'Active') ? 'badge-success' : 'badge-danger'?>">
                                                <?=$banner['banner_status']?>        
                                            </p>
                                            </td>
                                            <td>
                                                <a href="banner_update.php?id=<?=$banner['id']?>" class="btn btn-warning">Edit</a>
                                                <a href="banner_delete.php?id=<?=$banner['id']?>" class="btn btn-danger">Delete</a>
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