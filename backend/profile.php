<?php
    require_once('inc/header.php');
?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Profile</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Update Profile info</h5>
            </div>
            <?php
                $email = $_SESSION['auth_email'];
                $auth_info_query = "SELECT * FROM `admins` WHERE email = '$email'";
                $auth_info_query_db = mysqli_query($db_connect, $auth_info_query);
                $auth_info = mysqli_fetch_assoc($auth_info_query_db);
            ?>
            <form action="profile_data.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <label for="signUpUsername" class="form-label">Your Name</label>
                            <input type="text" class="form-control m-b-md" name="name" value="<?=$auth_info['name']?>">
                        </div>
                    </div>
                    <div class="example-container">
                        <div class="example-content">
                            <label for="signUpUsername" class="form-label">Your Phone Number</label>
                            <input type="tel" class="form-control m-b-md" name="phone_number" value="<?=$auth_info['phone_Number']?>">
                        </div>
                    </div>
                    <div class="example-container">
                        <div class="example-content">
                            <label for="signUpUsername" class="form-label">Your Address</label>
                            <input type="text" class="form-control m-b-md" name="address" value="<?=$auth_info['address']?>">
                        </div>
                    </div>
                    <div class="example-container">
                        <div class="example-content">
                            <label for="signUpUsername" class="form-label">Your Profile Pic</label>
                            <input type="file" class="form-control m-b-md" name="profile_pic">
                        </div>
                    </div>
                    <div class="example-container">
                        <div class="example-content">
                            <label for="signUpUsername" class="form-label">Your Current Password</label>
                            <input type="password" class="form-control m-b-md <?=(isset($_SESSION['current_password_error'])) ? 'is-invalid' : ''?>" name="current_password">
                            <?php
                                if(isset($_SESSION['current_password_error'])){?>
                                    <p class="text-danger"><?=$_SESSION['current_password_error']?></p>
                            <?php
                                }
                                unset($_SESSION['current_password_error']);
                            ?>
                        </div>
                    </div>
                    <div class="example-container">
                        <div class="example-content">
                            <label for="signUpUsername" class="form-label">Your New Password</label>
                            <input type="password" class="form-control m-b-md <?=(isset($_SESSION['new_password_error'])) ? 'is-invalid' : ''?>" name="new_password">
                            <?php
                                if(isset($_SESSION['new_password_error'])){?>
                                    <p class="text-danger"><?=$_SESSION['new_password_error']?></p>
                            <?php
                                }
                                unset($_SESSION['new_password_error']);
                            ?>
                        </div>
                    </div>
                    <div class="example-container">
                        <div class="example-content">
                            <label for="signUpUsername" class="form-label">Your Confirm Password</label>
                            <input type="password" class="form-control m-b-md <?=(isset($_SESSION['confirm_password_error'])) ? 'is-invalid' : ''?>" name="confirm_password">
                            <?php
                                if(isset($_SESSION['confirm_password_error'])){?>
                                    <p class="text-danger"><?=$_SESSION['confirm_password_error']?></p>
                            <?php
                                }
                                unset($_SESSION['confirm_password_error']);
                            ?>
                        </div>
                    </div>
                    <div class="example-container">
                        <div class="example-content">
                            <button type="submit" class="btn btn-success" name="update_profile">Update Profile</button>
                            <button type="submit" class="btn btn-danger" name="update_password">Update Password</button>
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