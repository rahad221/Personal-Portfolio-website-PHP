<?php
    require_once('inc/header.php');
?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Service List</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Service List</h5>
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
                                    <th>Service Title</th>
                                    <th>Service Icon</th>
                                    <th>Service Description</th>
                                    <th>Service Status</th>
                                    <th>Service Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $serial = 1;
                                    $service_query = "SELECT * FROM `service` ORDER BY id DESC";
                                    $service_query_db = mysqli_query($db_connect, $service_query);
                                    
                                    foreach($service_query_db as $service) : ?>
                                    <tr>
                                        <th><?=$serial++?></th>
                                        <td><?=$service['service_title']?></td>
                                        <td>
                                            <i class="<?=$service['service_icon']?>"></i>
                                        </td>
                                        <td><?=$service['service_description']?></td>
                                        <td>
                                            <p class="badge <?=($service['service_status'] === 'Active') ? 'badge-success' : 'badge-danger'?>">
                                                <?=$service['service_status']?>        
                                            </p>
                                        </td>
                                        <td>
                                            <a href="service_update.php?id=<?=$service['id']?>" class="btn btn-warning">Edit</a>
                                            <a href="service_delete.php?id=<?=$service['id']?>" class="btn btn-danger">Delete</a>
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