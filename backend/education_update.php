<?php
    require_once('inc/header.php');
?>
<div class="row">
    <div class="col">
        <div class="title-descriotion">
            <h1>Update Education</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Update Education Info</h5>
            </div>
            <?php
                if(isset($_SESSION['education_update'])){ ?>
                    <div class="alert alert-primary" role="alert">
                        <p><?=$_SESSION['education_update']?></p>
                    </div>
            <?php
                }
                unset($_SESSION['education_update']);
            ?>
            <?php
                $id = $_GET['id'];
                $course_query = "SELECT * FROM `course` WHERE `id` = '$id'";
                $course_query_db = mysqli_query($db_connect, $course_query);
                $course = mysqli_fetch_assoc($course_query_db);
            ?>
            <form action="education_update_data.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <label for="basic-url" class="forn-label">Coure Name</label>
                            <input type="number" class="form-control" name="id" value="<?=$id?>" hidden>
                            <input type="text" class="form-control <?=(isset($_SESSION['course_name_error'])) ? 'is-invalid' : ''?>" placeholder="Enter Your Course Name" name="course_name" value="<?=$course['course_name']?>">
                            <?php
                                if(isset($_SESSION['course_name_error'])){ ?>
                                    <p class="text-danger"><?=$_SESSION['course_name_error'] ?></p>
                            <?php
                                }
                                unset($_SESSION['course_name_error']);
                            ?>
                        </div>
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Course Year</label>
                            <input type="number" class="form-control <?=(isset($_SESSION['course_year_error'])) ? 'is-invalid' : ''?>" placeholder="Enter Your Course Year" name="course_Year" value="<?=$course['course_Year']?>">
                            <?php
                                if(isset($_SESSION['course_year_error'])){ ?>
                                    <p class="text-danger"><?=$_SESSION['course_year_error'] ?></p>
                            <?php
                                }
                                unset($_SESSION['course_year_error']);
                            ?>
                        </div>
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Course Percent</label>
                            <input type="number" class="form-control <?=(isset($_SESSION['course_percent_error'])) ? 'is-invalid' : ''?>" placeholder="Enter Your Course Percnt" name="course_percent" value="<?=$course['course_percent']?>">
                            <?php
                                if(isset($_SESSION['course_percent_error'])){ ?>
                                    <p class="text-danger"><?=$_SESSION['course_percent_error'] ?></p>
                            <?php
                                }
                                unset($_SESSION['course_percent_error']);
                            ?>
                        </div>
                        <div class="example-content">
                            <label for="basic-url" class="form-control">Coure Status</label>
                            <select class="form-control" name="course_status">
                                <option value="Active" <?=($course['course_status'] === 'Active') ? 'selected' : ''?> class="form-control">Active</option>
                                <option value="Inactive"  <?=($course['course_status'] === 'Inactive') ? 'selected' : ''?> class="form-control">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="example-container">
                        <div class="example-content">
                            <button type="submit" class="btn btn-success">Update Course</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    require_once('inc/footer.php')
?>