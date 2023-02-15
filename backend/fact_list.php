<?php
    require_once('inc/header.php');
?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Feature List</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Feature List</h5>
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
                                    <th>feature_icon</th>
                                    <th>feature_value</th>
                                    <th>feature_text</th>
                                    <th>fact_status</th>
                                    <th>fact_actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $serial = 1;
                                    $fact_query = "SELECT * FROM `fact` ORDER BY id DESC";
                                    $fact_query_db = mysqli_query($db_connect, $fact_query);
                                    
                                    foreach($fact_query_db as $fact) : ?>
                                    <tr>
                                        <th><?=$serial++?></th>
                                        <td><i class="<?=$fact['feature_icon']?>"></i></td>
                                        <td><?=$fact['feature_value']?></td>
                                        <td><?=$fact['feature_text']?></td>
                                        <td>
                                            <p class="badge <?=($fact['fact_status'] === 'Active') ? 'badge-success' : 'badge-danger'?>">
                                                <?=$fact['fact_status']?>        
                                            </p>
                                        </td>
                                        <td>
                                            <a href="fact_update.php?id=<?=$fact['id']?>" class="btn btn-warning">Edit</a>
                                            <a href="fact_delete.php?id=<?=$fact['id']?>" class="btn btn-danger">Delete</a>
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