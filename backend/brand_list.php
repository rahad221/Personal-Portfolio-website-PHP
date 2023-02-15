<?php
    require_once('inc/header.php');
?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Brand List</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Brand List Info</h5>
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
                                    <th>Brand Image</th>
                                    <th>Brand Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $serial = 1;
                                    $brand_query = "SELECT * FROM `brand` ORDER BY id DESC";
                                    $brand_query_db = mysqli_query($db_connect, $brand_query);

                                    foreach($brand_query_db as $brand) :?>
                                        <tr>
                                            <th><?=$serial++?></th>
                                            <td>
                                                <img src="uploads/brand_image/<?=$brand['brand_image']?>" alt="" height="100px" width="100px">
                                            </td>
                                            <td>
                                            <p class="badge <?=($brand['brand_status'] === 'Active') ? 'badge-success' : 'badge-danger'?>">
                                                <?=$brand['brand_status']?>        
                                            </p>
                                            </td>
                                            <td>
                                                <a href="brand_update.php?id=<?=$brand['id']?>" class="btn btn-warning">Edit</a>
                                                <a href="brand_delete.php?id=<?=$brand['id']?>" class="btn btn-danger">Delete</a>
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