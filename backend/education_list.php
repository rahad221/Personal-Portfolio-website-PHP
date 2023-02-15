<?php
    require_once('inc/header.php');
?>
<div class="row">
    <div class="col">
        <div class="title-description">
            <h1>Eduacation List</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Education List</h5>
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
                                    <th>Course Name</th>
                                    <th>Coursr Year</th>
                                    <th>Course Percent</th>
                                    <th>Course Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $serial = 1;
                                    $course_query = "SELECT * FROM `course`";
                                    $course_query_db = mysqli_query($db_connect, $course_query);

                                    foreach($course_query_db as $course) : ?>
                                    <tr>
                                        <th><?=$serial++?></th>
                                        <td><?=$course['course_name']?></td>
                                        <td><?=$course['course_Year']?></td>
                                        <td><?=$course['course_percent']?></td>
                                        <td>
                                            <p class="badge <?=($course['course_status'] === 'Active') ? 'badge-success' : 'badge-danger'?>">
                                                <?=$course['course_status']?>        
                                            </p>
                                        </td>
                                        <td>
                                            <a href="education_update.php?id=<?=$course['id']?>" class="btn btn-warning">Edit</a>
                                            <a href="education_delete.php?id=<?=$course['id']?>" class="btn btn-danger">Delete</a>
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