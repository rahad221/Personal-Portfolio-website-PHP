<?php
    session_start();
    require_once('inc/header.php');
?>
<div class="row">
    <div class="col">
        <div class="title-description">
            <h1>Education Image Add</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Education Image Add Info</h5>
            </div>
            <?php
                if(isset($_SESSION['education_add'])){ ?>
                    <div class="alert alert-primary" role="alert">
                        <p><?=$_SESSION['education_add']?></p>
                    </div>
            <?php
                }
                unset($_SESSION['education_add']);
            ?>
            <form action="education_image_add_data.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Education Image</label>
                            <input type="file" class="form-control" name="education_image">
                        </div>
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Education Description</label>
                            <textarea name="education_description" class="form-control <?=(isset($_SESSION['education_description_error'])) ? 'is-invalid' : ''?>" cols="30" rows="10"></textarea>
                            <?php
                                if(isset($_SESSION['education_description_error'])){ ?>
                                    <p class="text-danger"><?=$_SESSION['education_description_error'] ?></p>
                            <?php
                                }
                                unset($_SESSION['education_description_error']);
                            ?>
                        </div>
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Education Status</label>
                            <select class="form-control" name="education_status">
                                <option value="Active" class="form-control">Active</option>
                                <option value="Inctive" class="form-control">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="example-container">
                        <div class="example-content">
                            <button type="submit" class="btn btn-success">Add Education Image</button>
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