<?php
    require_once('inc/header.php');
?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Testimonial List</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Testimonial List</h5>
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
                                    <th>Testimonial Heading</th>
                                    <th>Testimonial Image</th>
                                    <th>Testimonial Description</th>
                                    <th>Testimonial Name</th>
                                    <th>Testimonial Title</th>
                                    <th>Testimonial Status</th>
                                    <th>Testimonial Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $serial = 1;
                                    $testimonial_query = "SELECT * FROM `testimonial` ORDER BY id DESC";
                                    $testimonial_query_db = mysqli_query($db_connect, $testimonial_query);
                                    
                                    foreach($testimonial_query_db as $testimonial) : ?>
                                    <tr>
                                        <th><?=$serial++?></th>
                                        <td><?=$testimonial['t_head']?></td>
                                        <td>
                                            <img src="uploads/testimonial_image/<?=$testimonial['t_image']?>" height="100px" width="100px" alt="">
                                        </td>
                                        <td><?=$testimonial['t_decs']?></td>
                                        <td><?=$testimonial['t_name']?></td>
                                        <td><?=$testimonial['t_title']?></td>
                                        <td>
                                            <p class="badge <?=($testimonial['t_status'] === 'Active') ? 'badge-success' : 'badge-danger'?>">
                                                <?=$testimonial['t_status']?>        
                                            </p>
                                        </td>
                                        <td>
                                            <a href="testimonial_update.php?id=<?=$testimonial['id']?>" class="btn btn-warning">Edit</a>
                                            <a href="testimonial_delete.php?id=<?=$testimonial['id']?>" class="btn btn-danger">Delete</a>
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