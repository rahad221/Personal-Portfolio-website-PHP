<?php
    require_once('inc/header.php');
?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Banner Add</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Banner Add Info</h5>
            </div>
            <?php
                if(isset($_SESSION['banner_add'])){ ?>
                    <div class="alert alert-primary" role="alert">
                        <p><?=$_SESSION['banner_add']?></p>
                    </div>
            <?php
                }
                unset($_SESSION['banner_add']);
            ?>
            <form action="banner_add_data.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Banner Name</label>
                            <input type="text" class="form-control <?=(isset($_SESSION['banner_name_error'])) ? 'is-invalid' : ''?>" placeholder="Enter Your Banner Name" name="banner_name">
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
                            <textarea type="text" class="form-control <?=(isset($_SESSION['banner_descrtiption_error'])) ? 'is-invalid' : ''?>" placeholder="Enter Your Banner Descrtiption" name="banner_descrtiption" rows="10"></textarea>
                            <?php
                                if(isset($_SESSION['banner_descrtiption_error'])){ ?>
                                    <p class="text-danger"><?=$_SESSION['banner_descrtiption_error'] ?></p>
                            <?php
                                }
                                unset($_SESSION['banner_descrtiption_error']);
                            ?>
                        </div>
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Banner Image</label>
                            <input type="file" class="form-control" name="banner_image">
                        </div>
                        <div class="example-contrnt">
                            <label for="basic-url" class="form-label">Banner Status</label>
                            <select class="form-control" name="banner_status">
                                <option value="Active" class="form-control">Active</option>
                                <option value="Inactive" class="form-control">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="example-container">
                        <div class="example-content">
                            <button type="submit" class="btn btn-success">Add Banner</button>
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