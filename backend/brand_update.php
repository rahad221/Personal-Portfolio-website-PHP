<?php
    require_once('inc/header.php');
?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Brand update</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Brand update Info</h5>
            </div>
            <?php
                if(isset($_SESSION['brand_update'])){ ?>
                    <div class="alert alert-primary" role="alert">
                        <p><?=$_SESSION['brand_update']?></p>
                    </div>
            <?php
                }
                unset($_SESSION['brand_update']);
            ?>
            <?php
                $id = $_GET['id'];
                $brand_query = "SELECT * FROM `brand` WHERE id=$id";
                $brand_query_db = mysqli_query($db_connect, $brand_query);
                $brand = mysqli_fetch_assoc($brand_query_db);
            ?>
            <form action="brand_update_data.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Brand Image</label>
                            <input type="number" class="form-control" name="id" value="<?=$id?>" hidden>
                            <input type="file" class="form-control" name="brand_image">
                        </div>
                        <div class="example-contrnt">
                            <label for="basic-url" class="form-label">Brand Status</label>
                            <select class="form-control" name="brand_status">
                                <option class="form-control" value="Active" <?=($brand['brand_status'] === 'Active') ? 'selected' : ''?>>Active</option>
                                <option class="form-control" value="Inactive" <?=($brand['brand_status'] === 'Inactive') ? 'selected' : ''?>>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="example-container">
                        <div class="example-content">
                            <button type="submit" class="btn btn-success">Update Brand</button>
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