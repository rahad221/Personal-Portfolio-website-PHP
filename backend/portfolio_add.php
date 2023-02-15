<?php
    require_once('inc/header.php');
?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Portfolio Add</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card_tiitle">Portfolio Add Info</h5>
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
            <form action="portfolio_add_data.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <label for="basic-url" class="form-control">Portfolio Title</label>
                            <input type="text" class="form-control <?=(isset($_SESSION['portfolio_title_error'])) ? 'is-invalid' : ''?>" placeholder="Enter Your Portfolio Title" name="portfolio_title">
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
                            <input type="text" class="form-control <?=(isset($_SESSION['portfolio_header_error'])) ? 'is-invalid' : ''?>" placeholder="Enter Your Portfolio Header" name="portfolio_header">
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
                            <textarea type="text" class="form-control <?=(isset($_SESSION['portfolio_description_error'])) ? 'is-invalid' : ''?>" placeholder="Enter Your Service Portfolio" name="portfolio_description" rows="10" cols="30"></textarea>
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
                            <label for="basic-url" class="form-label">Service Status</label>
                            <select class="form-control" name="portfolio_status">
                                <option class="form-control" value="Active">Active</option>
                                <option class="form-control" value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="example-container">
                        <div class="example-content">
                        <button class="btn btn-success">Add Portfolio</button>
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