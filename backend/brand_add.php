<?php
    require_once('inc/header.php');
?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Brand Add</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Brand Add Info</h5>
            </div>
            <?php
                if(isset($_SESSION['brand_add'])){ ?>
                    <div class="alert alert-primary" role="alert">
                        <p><?=$_SESSION['brand_add']?></p>
                    </div>
            <?php
                }
                unset($_SESSION['brand_add']);
            ?>
            <form action="brand_add_data.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Brand Image</label>
                            <input type="file" class="form-control" name="brand_image">
                        </div>
                        <div class="example-contrnt">
                            <label for="basic-url" class="form-label">Brand Status</label>
                            <select class="form-control" name="brand_status">
                                <option value="Active" class="form-control">Active</option>
                                <option value="Inactive" class="form-control">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="example-container">
                        <div class="example-content">
                            <button type="submit" class="btn btn-success">Add Brand</button>
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