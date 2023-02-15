<?php
    require_once('inc/header.php');
?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Banner update</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Banner update Info</h5>
            </div>
            <?php
                if(isset($_SESSION['banner_update'])){ ?>
                    <div class="alert alert-primary" role="alert">
                        <p><?=$_SESSION['banner_update']?></p>
                    </div>
            <?php
                }
                unset($_SESSION['banner_update']);
            ?>
            <?php
                $id = $_GET['id'];
                $banner_query = "SELECT * FROM `banner` WHERE id=$id";
                $banner_query_db = mysqli_query($db_connect, $banner_query);
                $banner = mysqli_fetch_assoc($banner_query_db);
            ?>
            <form action="banner_update_data.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Banner Name</label>
                            <input type="number" class="form-control" name="id" value="<?=$id?>" hidden>
                            <input type="text" class="form-control <?=(isset($_SESSION['banner_name_error'])) ? 'is-invalid' : ''?>" placeholder="Enter Your Banner Name" name="banner_name" value="<?=$banner['banner_name']?>">
                            <?php
                                if(isset($_SESSION['banner_name_error'])){ ?>
                                    <p class="text-danger"><?=$_SESSION['banner_name_error'] ?></p>
                            <?php
                                }
                                unset($_SESSION['banner_name_error']);
                            ?>
                        </div>
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Banner Descrtiption</label>
                            <textarea type="text" class="form-control <?=(isset($_SESSION['banner_descrtiption_error'])) ? 'is-invalid' : ''?>" placeholder="Enter Your Banner Descrtiption" name="banner_descrtiption" rows="10"><?=$banner['banner_descrtiption']?></textarea>
                            <?php
                                if(isset($_SESSION['banner_descrtiption_error'])){ ?>
                                    <p class="text-danger"><?=$_SESSION['banner_descrtiption_error'] ?></p>
                            <?php
                                }
                                unset($_SESSION['banner_descrtiption_error']);
                            ?>
                        </div>
                        <div class="example-content">
                            <label for="basic-url" class="form-label">banner Image</label>
                            <input type="file" class="form-control" name="banner_image">
                        </div>
                        <div class="example-contrnt">
                            <label for="basic-url" class="form-label">banner Status</label>
                            <select class="form-control" name="banner_status">
                                <option class="form-control" value="Active" <?=($banner['banner_status'] === 'Active') ? 'selected' : ''?>>Active</option>
                                <option class="form-control" value="Inactive" <?=($banner['banner_status'] === 'Inactive') ? 'selected' : ''?>>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="example-container">
                        <div class="example-content">
                            <button type="submit" class="btn btn-success">Update Banner</button>
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