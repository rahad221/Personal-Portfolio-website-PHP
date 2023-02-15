<?php
    require_once('inc/header.php');
?>
<div class="row">
    <div class="col">
        <div class="title-description">
            <h1>Education Image Update</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Education Image Update Info</h5>
            </div>
            <?php
                $id = $_GET['id'];
                $education_query = "SELECT * FROM `educations` WHERE id = $id";
                $education_query_db = mysqli_query($db_connect, $education_query);
                $education = mysqli_fetch_assoc($education_query_db);
            ?>
            <?php
                if(isset($_SESSION['education_update'])){ ?>
                    <div class="alert alert-primary" role="alert">
                        <p><?=$_SESSION['education_update']?></p>
                    </div>
            <?php
                }
                unset($_SESSION['education_update']);
            ?>
            <form action="education_image_update_data.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Education Image</label>
                            <input type="number" class="form-control" name="id" value="<?=$id?>" hidden>
                            <input type="file" class="form-control" name="education_image">
                        </div>
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Education Description</label>
                            <textarea name="education_description" class="form-control <?=(isset($_SESSION['education_description_error'])) ? 'is-invalid' : ''?>" cols="30" rows="10"><?=$education['education_description']?></textarea>
                            <?php
                                if(isset($_SESSION['education_description_error'])){ ?>
                                    <p class="text-danger"><?=$_SESSION['education_description_error'] ?></p>
                            <?php
                                }
                                unset($_SESSION['education_description_error']);
                            ?>
                        </div>
                        <div class="example_content">
                        <label for="basic-url" class="form-label">Education Status</label>
                            <select class="form-control" name="education_status">
                                <option class="form-control" value="Active" <?=($education['education_status'] === 'Active' ? 'selected' : '')?>>Active</option>
                                <option class="form-control" value="Inactive" <?=($education['education_status'] === 'Inctive' ? 'selected' : '')?>>Inctive</option>
                            </select>
                        </div>
                    </div>
                    <div class="example-container">
                        <div class="example-content">
                            <button type="submit" class="btn btn-success">Update Education Image</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    require_once('inc/footer.php');
?>