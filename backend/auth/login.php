<?php
    session_start();
    require_once('inc/header.php');
?>
<div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
    <div class="app-auth-background">

    </div>
    <div class="app-auth-container">
        <div class="logo">
            <a href="index.html">Neptune</a>
        </div>
        <p class="auth-description">Please sign-in to your account and continue to the dashboard.<br>Don't have an account? <a href="reg.php">Sign Up</a></p>

        <?php
            if(isset($_SESSION['user_register'])){ ?>
                <div class="alert alert-primary" role="alert">
                    <p><?=$_SESSION['user_register']?></p>
                </div>
        <?php
            }
            unset($_SESSION['user_register']);
        ?>

        <?php
            if(isset($_SESSION['auth_error'])){ ?>
                <div class="alert alert-danger" role="alert">
                    <p><?=$_SESSION['auth_error']?></p>
                </div>
        <?php
            }
            unset($_SESSION['auth_error']);
        ?>

        <form action="login_data.php" method="post">
            <div class="auth-credentials m-b-xxl">
            <div class="example-container">
                    <div class="example-content">
                        <label for="signUpUsername" class="form-label">Your E-mail</label>
                        <input type="text" class="form-control m-b-md <?= (isset($_SESSION['email_error'])) ? 'is-invalid' : '' ?>" placeholder="Enter Your E_mail" name="email">
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