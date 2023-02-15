<?php
    require_once('inc/header.php');
?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Service Add</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card_tiitle">Service Add Info</h5>
            </div>
            <?php
                if(isset($_SESSION['service_add'])){ ?>
                <div class="alert alert-primary" role="alert">
                    <p><?=$_SESSION['service_add']?></p>
                </div>
            <?php
                }
                unset($_SESSION['service_add']);
            ?>
            <form action="service_add_data.php" method="post">
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Service Title</label>
                            <input type="text" class="form-control <?=(isset($_SESSION['service_title_error'])) ? 'is-invalid' : ''?>" placeholder="Enter Your Service Title" name="service_title" value="<?=(isset($_SESSION['old_service_title'])) ? $_SESSION['old_service_title'] : ''?>">
                            <?php
                                if(isset($_SESSION['service_title_error'])){ ?>
                                    <p class="text-danger"><?=$_SESSION['service_title_error']?>
                            <?php
                                }
                                unset($_SESSION['service_title_error']);
                            ?>
                        </div>
                    </div>
                    <div class="example-container">
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Service Icon</label>
                            <input type="text" class="form-control icon_value <?=(isset($_SESSION['service_icon_error'])) ? 'is-invalid' : ''?>" placeholder="Enter Your Service Icon" name="service_icon" value="<?=(isset($_SESSION['old_service_icon'])) ? $_SESSION['old_service_icon'] : ''?>">
                            <?php
                                if(isset($_SESSION['service_icon_error'])){ ?>
                                    <p class="text-danger"><?=$_SESSION['service_icon_error']?>
                            <?php
                                }
                                unset($_SESSION['service_icon_error']);
                            ?>
                        </div>
                        <div class="card" style="background: black; border-color: darkblue;">
                            <div class="card-body" style="overflow-y: scroll; height: 150px;">
                                <?php
                                    require_once('inc/icons.php');
                                    foreach($fonts as $font) :?>
                                    <span class="card-text text-white m-2" style="cursor: pointer;"><i id="<?=$font?>" class="<?=$font?> fa-lg icon_click"></i></span>
                                <?php
                                    endforeach
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="example-container">
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Service Description</label>
                            <textarea type="text" class="form-control <?=(isset($_SESSION['service_description_error'])) ? 'is-invalid' : ''?>" placeholder="Enter Your Service Description" name="service_description" rows="10" cols="30"></textarea>
                            <?php
                                if(isset($_SESSION['service_description_error'])){ ?>
                                    <p class="text-danger"><?=$_SESSION['service_description_error']?>
                            <?php
                                }
                                unset($_SESSION['service_description_error']);
                            ?>
                        </div>
                    </div>
                    <div class="example-container">
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Service Status</label>
                            <select class="form-control" name="service_status">
                                <option class="form-control" value="Active">Active</option>
                                <option class="form-control" value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="example-container">
                        <div class="example-content">
                            <button class="btn btn-success">Add Service</button>
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
<script>
    $(document).ready(function(){
        $('.icon_click').click(function(){
            $('.icon_value').val($(this).attr('id'))
        })
    })
</script>