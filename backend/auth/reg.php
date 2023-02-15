<?php
    session_start();
    require_once('inc/header.php');
?>
<div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
    <div class="app-auth-background">

    </div>
    <div class="app-auth-container">
        <div class="logo">
            <a href="index.html">Neptune</a>
        </div>
        <p class="auth-description">Please enter your credentials to create an account.<br>Already have an account? <a href="login.php">Sign In</a></p>

        <form action="reg_data.php" method="post">
            <div class="auth-credentials m-b-xxl">
                <div class="example-container">
                    <div class="example-content">
                        <label for="signUpUsername" class="form-label">Your Name</label>
                        <input type="text" class="form-control m-b-md <?= (isset($_SESSION['name_error'])) ? 'is-invalid' : '' ?>" placeholder="Enter Your Name" name="name" value="<?= (isset($_SESSION['old_name'])) ? $_SESSION['old_name'] : '' ?>">
                        <?php
                            if (isset($_SESSION['name_error'])) { ?>
                                <p class="text-danger"><?= $_SESSION['name_error'] ?></p>
                        <?php
                            }
                            unset($_SESSION['name_error']);
                        ?>
                    </div>
                </div>
                <div class="example-container">
                    <div class="example-content">
                        <label for="signUpUsername" class="form-label">Your E-mail</label>
                        <input type="text" class="form-control m-b-md <?= (isset($_SESSION['email_error'])) ? 'is-invalid' : '' ?>" placeholder="Enter Your E_mail" name="email" value="<?= (isset($_SESSION['old_name'])) ? $_SESSION['old_email'] : '' ?>">
                        <?php
                            if (isset($_SESSION['email_error'])) { ?>
                                <p class="text-danger"><?= $_SESSION['email_error'] ?></p>
                        <?php
                            }
                            unset($_SESSION['email_error']);
                        ?>
                    </div>
                </div>
                <div class="example-container">
                    <div class="example-content">
                        <label for="signUpUsername" class="form-label">Your Password</label>
                        <input id="myInput" type="password" class="form-control m-b-md <?= (isset($_SESSION['password_error'])) ? 'is-invalid' : '' ?>" placeholder="Enter Your Password" name="password">
                        <?php
                            if (isset($_SESSION['password_error'])) { ?>
                                <p class="text-danger"><?= $_SESSION['password_error'] ?></p>
                        <?php
                            }
                            unset($_SESSION['password_error']);
                        ?>
                        <input type="checkbox" onclick="myFunction()">Show Password 
                    </div>
                </div>
                <div class="example-container">
                    <div class="example-content">
                        <label for="signUpUsername" class="form-label">Your Comfirm Password</label>
                        <input type="password" class="form-control m-b-md <?= (isset($_SESSION['comfirm_password_error'])) ? 'is-invalid' : '' ?>" placeholder="Enter Your Comfirm Password" name="comfirm_password">
                        <?php
                            if (isset($_SESSION['comfirm_password_error'])) { ?>
                                <p class="text-danger"><?= $_SESSION['comfirm_password_error'] ?></p>
                        <?php
                            }
                            unset($_SESSION['comfirm_password_error']);
                        ?>
                    </div>
                </div>
                <div class="example-container">
                    <div class="ecample-content">
                        <div class="auth-submit">
                            <button type="submit" class="btn btn-primary">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
require_once('inc/footer.php');
?>