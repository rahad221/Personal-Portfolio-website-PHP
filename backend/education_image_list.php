<?php
    require_once('inc/header.php');
?>
<div class="row">
    <div class="col">
        <div class="title-description">
            <h1>Education Image List</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Education Image List</h5>
            </div>
            <?php
                if(isset($_SESSION['education_delete'])){ ?>
                    <div class="alert alert-danger" role="alert">
                        <p><?=$_SESSION['education_delete']?></p>
                    </div>
            <?php
                }
                unset($_SESSION['education_delete']);
            ?>
            <div class="card-body">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>Serial</th>
                            <th>Education Image</th>
                            <th>Education Description</th>
                            <th>Education Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $serial = 1;
                            $education_query = "SELECT * FROM `educations`";
                            $education_query_db = mysqli_query($db_connect, $education_query);

                            foreach($education_query_db as $education) : ?>
                            <tr>
                                <th><?=$serial++?></th>
                                <td>
                                    <img src="uploads/education_image/<?=$education['education_image']?>" width="100px" height="100px" alt="">
                                </td>
                                <td><?=$education['education_description']?></td>
                                <td>
                                    <p class="badge <?=($education['education_status'] === 'Active') ? 'badge-success' : 'badge-danger'?>"><?=$education['education_status']?></p>
                                </td>
                                <td>
                                    <a href="education_image_update.php?id=<?=$education['id']?>" class="btn btn-warning">Edit</a>
                                    <a href="education_image_delete.php?id=<?=$education['id']?>" class="btn btn-danger">Delete</a>
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
<?php
    require_once('inc/footer.php');
?>