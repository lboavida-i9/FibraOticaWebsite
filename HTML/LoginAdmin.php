<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    include_once "Content/_header.html";
    ?>
    <link rel="stylesheet" href="../PHP/Style.php/LoginAdmin.scss">
    <script src="../JS/LoginAdmin.js"></script>
    <title>Login Admin</title>
</head>

<?php
include_once "../PHP/LoginAdminHelper.php";
?>

<body onload="LoadJs();">
    <?php
    include_once "Content/Navbar.html";
    include_once "Content/Loader.html";
    ?>

    <div class="container height-control">
        <div id="InfoAlertDiv" class="alert alert-info alert-dismissible fade hide mt-5">
            <button type="button" class="close" onclick="$('#InfoAlertDiv').removeClass('show');$('#InfoAlertDiv').addClass('hide');">&times;</button>
            <p id="InfoAlert" class="m-0"></p>
        </div>
        <div class="row">
            <form action="#" class="col-md-6 offset-md-3 col-12 mt-3">
                <div class="form-group">
                    <label for="EmailTxt">Email address</label>
                    <input type="email" id="EmailTxt" class="form-control" placeholder="Enter email" required>
                </div>

                <div class="form-group">
                    <label for="PasswordTxt">Password</label>
                    <input type="password" id="PasswordTxt" class="form-control" placeholder="Enter your password" required>
                </div>

                <button onclick="Login()" class="btn btn-primary w-100-small" type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
<?php
    include_once "Content/_Footer.html";
?>
<?php
include_once "Content/_scripts.html";
?>

</html>