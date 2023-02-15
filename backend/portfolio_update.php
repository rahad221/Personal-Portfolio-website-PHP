<?php
    require_once('inc/header.php');
?>
<div class="row">
    <div class="col">
        <div class=""page-description"">
            <h1>Portfolio Update</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card_tiitle">Portfolio Update Info</h5>
            </div>
        </div>
        <?php
            if(isset($_SESSION['portfolio_add'])){ ?>
            <div class="alert alert-primary" role="alert">
                <p><?=$_SESSION['portfolio_add']?></p>
            </div>
        <?php
            }
            unset($_SESSION['portfolio_add']);
        ?>
        <?php
            $id = $_GET['id'];
            $portfolio_query = "SELECT * FROM `portfolio` WHERE `id` = '$id'";
            $portfolio_query_db = mysqli_query($db_connect, $portfolio_query);
            $portfolio = mysqli_fetch_assoc($portfolio_query_db);
        ?>
        <form action="portfolio_update_data.php" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="example-container">
                    <div class="example-content">
                        <label for="basic-url" class="form-control">Portfolio Title</label>
                        <input type="number" class="form-control" name="id" value="<?=$id?>" hidden>
                        <input type="text" class="form-control <?=(isset($_SESSION['portfolio_title_error'])) ? 'is-invalid' : ''?>" placeholder="Enter Your Portfolio Title" name="portfolio_title" value="<?=$portfolio['portfolio_title']?>">
                        <?php
                            if(isset($_SESSION['portfolio_title_error'])){ ?>
                                <p class="text-danger"><?=$_SESSION['portfolio_title_error'] ?></p>
                        <?php
                            }
                            unset($_SESSION['portfolio_title_error']);
                        ?>
                    </div>
                </div>
                <div class="example-container">
                    <div class="example-content">
                        <label for="basic-url" class="form-control">Portfolio Header</label>
                        <input type="text" class="form-control <?=(isset($_SESSION['portfolio_header_error'])) ? 'is-invalid' : ''?>" placeholder="Enter Your Portfolio Header" name="portfolio_header" value="<?=$portfolio['portfolio_header']?>">
                        <?php
                            if(isset($_SESSION['portfolio_header_error'])){ ?>
                                <p class="text-danger"><?=$_SESSION['portfolio_header_error'] ?></p>
                        <?php
                            }
                            unset($_SESSION['portfolio_header_error']);
                        ?>
                    </div>
                </div>
                <div class="example-container">
                    <div class="example-content">
                        <label for="basic-url" class="form-label">Portfolio Description</label>
                        <textarea type="text" class="form-control <?=(isset($_SESSION['portfolio_description_error'])) ? 'is-invalid' : ''?>" placeholder="Enter Your Service Portfolio" name="portfolio_description" rows="10" cols="30"><?=$portfolio['portfolio_description']?></textarea>
                        <?php
                            if(isset($_SESSION['portfolio_description_error'])){ ?>
                                <p class="text-danger"><?=$_SESSION['portfolio_description_error'] ?></p>
                        <?php
                            }
                            unset($_SESSION['portfolio_description_error']);
                        ?>
                    </div>
                </div>
                <div class="example-container">
                    <div class="example-content">
                        <label for="basic-url" class="form-control">Portfolio Image</label>
                        <input type="file" class="form-control" name="portfolio_image">
                    </div>
                </div>
                <div class="example-container">
                    <div class="example-content">
                        <label for="basic-url" class="form-label">Portfolio Status</label>
                        <select class="form-control" name="portfolio_status">
                            <option class="form-control" value="Active" <?=($portfolio['portfolio_status'] === 'Active') ? 'selected' : ''?>>Active</option>
                            <option class="form-control" value="Inactive" <?=($portfolio['portfolio_status'] === 'Inactive') ? 'selected' : ''?>>Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="example-container">
                    <div class="example-content">
                    <button class="btn btn-success">Update Portfolio</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
    require_once('inc/footer.php')
?>