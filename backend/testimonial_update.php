<?php
    require_once('inc/header.php');
?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Testimonial Update</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card_tiitle">Testimonial Update Info</h5>
            </div>
            <?php
                if(isset($_SESSION['testimonial_add'])){ ?>
                <div class="alert alert-primary" role="alert">
                    <p><?=$_SESSION['testimonial_add']?></p>
                </div>
            <?php
                }
                unset($_SESSION['testimonial_add']);
            ?>
            <?php
                $id = $_GET['id'];
                $testimonial_query = "SELECT * FROM `testimonial` WHERE id=$id";
                $testimonial_query_db = mysqli_query($db_connect, $testimonial_query);
                $testimonial = mysqli_fetch_assoc($testimonial_query_db);
            ?>
            <form action="testimonial_update_data.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Testimonial Heading</label>
                            <input type="number" class="form-control" name="id" value="<?=$id?>" hidden>
                            <input type="text" class="form-control <?=(isset($_SESSION['testimonial_heading_error'])) ? 'is-invalid' : ''?>" placeholder="Enter Your Testimonial Heading" name="testimonial_heading" value="<?=$testimonial['t_head']?>">
                            <?php
                                if(isset($_SESSION['testimonial_heading_error'])){ ?>
                                    <p class="text-danger"><?=$_SESSION['testimonial_heading_error']?></p>
                            <?php
                                }
                                unset($_SESSION['testimonial_heading_error']);
                            ?>
                        </div>
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Testimonial Image</label>
                            <input type="file" class="form-control" name="testimonial_image">
                        </div>
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Testimonial Description</label>
                            <textarea name="testimonial_description" class="form-control <?=(isset($_SESSION['testimonial_description_error'])) ? 'is-invalid' : ''?>" placeholder="Enter Your Testimonial Description" cols="30" rows="10"><?=$testimonial['t_decs']?></textarea>
                            <?php
                                if(isset($_SESSION['testimonial_description_error'])){ ?>
                                    <p class="text-danger"><?=$_SESSION['testimonial_description_error']?></p>
                            <?php
                                }
                                unset($_SESSION['testimonial_description_error']);
                            ?>
                        </div>
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Testimonial Name</label>
                            <input type="text" class="form-control <?=(isset($_SESSION['testimonial_name_error'])) ? 'is-invalid' : ''?>" placeholder="Enter Your Testimonial Name" name="testimonial_name" value="<?=$testimonial['t_name']?>">
                            <?php
                                if(isset($_SESSION['testimonial_name_error'])){ ?>
                                    <p class="text-danger"><?=$_SESSION['testimonial_name_error']?></p>
                            <?php
                                }
                                unset($_SESSION['testimonial_name_error']);
                            ?>
                        </div>
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Testimonial Title</label>
                            <input type="text" class="form-control <?=(isset($_SESSION['testimonial_title_error'])) ? 'is-invalid' : ''?>" placeholder="Enter Your Testimonial Title" name="testimonial_title" value="<?=$testimonial['t_title']?>">
                            <?php
                                if(isset($_SESSION['testimonial_title_error'])){ ?>
                                    <p class="text-danger"><?=$_SESSION['testimonial_title_error']?></p>
                            <?php
                                }
                                unset($_SESSION['testimonial_title_error']);
                            ?>
                        </div>
                        <div class="example_content">
                        <label for="basic-url" class="form-label">Testimonial Status</label>
                            <select class="form-control" name="testimonial_status">
                                <option class="form-control" value="Active" <?=($testimonial['t_status'] === 'Active') ? 'selected' : ''?>>Active</option>
                                <option class="form-control" value="Inactive" <?=($testimonial['t_status'] === 'Inactive') ? 'selected' : ''?>>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="example-container">
                        <div class="example-content">
                            <button type="submit" class="btn btn-success">Update Testimonial</button>
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