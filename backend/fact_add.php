<?php
    require_once('inc/header.php');
?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Fact Add</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card_tiitle">Fact Add Info</h5>
            </div>
            <?php
                if(isset($_SESSION['fact_add'])){ ?>
                <div class="alert alert-primary" role="alert">
                    <p><?=$_SESSION['fact_add']?></p>
                </div>
            <?php
                }
                unset($_SESSION['fact_add']);
            ?>
            <form action="fact_add_data.php" method="post">
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Feature Icon</label>
                            <input type="text" class="form-control icon_value <?=(isset($_SESSION['feature_icon_error'])) ? 'is-invalid' : ''?>" placeholder="Enter Your Feature Icon" name="feature_icon">
                            <?php
                                if(isset($_SESSION['feature_icon_error'])){ ?>
                                    <p class="text-danger"><?=$_SESSION['feature_icon_error'] ?></p>
                            <?php
                                }
                                unset($_SESSION['feature_icon_error']);
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
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Feature Icon Value</label>
                            <input type="number" class="form-control <?=(isset($_SESSION['feature_icon_value_error'])) ? 'is-invalid' : ''?>" placeholder="Enter Your Feature Icon Value" name="feature_icon_value">
                            <?php
                                if(isset($_SESSION['feature_icon_value_error'])){ ?>
                                    <p class="text-danger"><?=$_SESSION['feature_icon_value_error'] ?></p>
                            <?php
                                }
                                unset($_SESSION['feature_icon_value_error']);
                            ?>
                        </div>
                    </div>
                    <div class="example-container">
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Feature Text</label>
                            <input type="text" class="form-control <?=(isset($_SESSION['feature_text_error'])) ? 'is-invalid' : ''?>" placeholder="Enter Your Feature Text" name="feature_text">
                            <?php
                                if(isset($_SESSION['feature_text_error'])){ ?>
                                    <p class="text-danger"><?=$_SESSION['feature_text_error'] ?></p>
                            <?php
                                }
                                unset($_SESSION['feature_text_error']);
                            ?>
                        </div>
                    </div>
                    <div class="example-container">
                        <div class="example-content">
                            <label for="basic-url" class="form-label">Fact Status</label>
                            <select class="form-control" name="fact_status">
                                <option class="form-control" value="Active">Active</option>
                                <option class="form-control" value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="example-container">
                        <div class="example-content">
                            <button class="btn btn-success">Add Feature</button>
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