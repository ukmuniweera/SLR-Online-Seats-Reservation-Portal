<?php
session_start();
include('assets/inc/config.php');

if (isset($_POST['pass_login'])) {
    $pass_email = $_POST['pass_email'];
    $pass_pwd = sha1(md5($_POST['pass_pwd']));
    $stmt = $mysqli->prepare("SELECT pass_email, pass_pwd, pass_id FROM orrs_passenger WHERE pass_email=? and pass_pwd=? ");
    $stmt->bind_param('ss', $pass_email, $pass_pwd);
    $stmt->execute();
    $stmt->bind_result($pass_email, $pass_pwd, $pass_id);
    $rs = $stmt->fetch();
    $_SESSION['pass_id'] = $pass_id;

    if ($rs) {
        header("location:pass-dashboard.php");
    } else {
        $error = "Access Denied. Please Check Your Credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <title>Sri Lanka Railways</title>
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" />
    <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css" />
    <link rel="stylesheet" href="assets/css/app.css" type="text/css" />

    <?php if (isset($error)) { ?>
        <script>
            setTimeout(function() {
                swal("Failed!", "<?php echo $error; ?>!", "error");
            }, 100);
        </script>
    <?php } ?>
</head>

<body class="be-splash-screen" style="background-image: url('images/bg1.jpg'); background-size: cover; background-position: center;">

    <div class="be-wrapper be-login">
        <div class="be-content">
            <div class="main-content container-fluid">
                <div class="splash-container">
                    <div class="card card-border-color card-border-color-success">
                        <div class="card-header"><img class="logo-img" src="assets/img/logo-xx.png" alt="logo" width="{conf.logoWidth}" height="27"><span class="splash-description">Please enter your user information.</span></div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="login-form ">
                                    <div class="form-group">
                                        <input class="form-control" name="pass_email" type="text" placeholder="Email" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="pass_pwd" type="password" placeholder="Password">
                                    </div>
                                    <div class="form-group row login-tools">
                                        <div class="col-6 login-remember">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="check1">
                                                <label class="custom-control-label" for="check1">Remember Me</label>
                                            </div>
                                        </div>
                                        <div class="col-6 login-forgot-password"><a href="pass-pwd-forgot.php">Forgot Password?</a></div>
                                    </div>
                                    <div class="form-group row login-submit">
                                        <div class="col-6"><a class="btn btn-danger btn-xl" href="pass-signup.php">Register</a></div>
                                        <div class="col-6"><input type="submit" name="pass_login" class="btn btn-success btn-xl" value="Log In"></div>
                                    </div>
                                </div>
                                <div class="splash-footer"><a href="index.php">Home</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script src="assets/js/swal.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            App.init();
        });
    </script>
</body>

</html>
