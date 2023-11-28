<?php
session_start();
if (isset($_SESSION["auth_id"])){
    header("location:profile/");
    return 1;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

<!--TITLE-->
<title>Kalam Academy</title>

<!--SHORTCUT ICON-->
<link rel="shortcut icon" href="assets/images/favicon.ico" />

<!--META TAGS-->
<meta charset="UTF-8" />
<meta name="language" content="ES" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />

<!--FONT AWESOME-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

<!--ICONIFY-->
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

<!--PLUGIN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!--GOOGLE FONTS-->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

<!--STYLE SHEET-->
<link rel="stylesheet" href="assets/css/main.css" />
<link rel="stylesheet" href="assets/css/animate.css" />
<link rel="stylesheet" href="assets/css/home.css" />

</head>
<body>

<!--MAIN-->
<main class="flex padding_4x">
    <section class="flex_content padding_2x">
        <article>
            <figure>
                <img src="assets/images/logo.png" alt="Kalam Academy" />
            </figure>
            <h1 class="title medium">Connect and share with <em>Kalam Academy</em>.</h1>
        </article>
    </section>
    <section class="flex_content padding_2x">
        <form class="login padding_2x" autocomplete="off">
            <input type="text" name="uname" maxlength="100" autocomplete="off" placeholder="Email address or phone number" />
            <input type="paddword" name="pssd" maxlength="30" autocomplete="off" placeholder="Password" />
            <button class="btn btn_1" type="submit" onclick="form_submit()">Login</button>
            <aside class="flex">
                <a href="#">Reset password?</a>
                <a href="#" onclick="modal('auth')">Create account?</a>
            </aside>
        </form>
    </section>
</main>

<!--JAVASCRIPT-->
<script type="text/javascript" src="assets/js/main.js"></script>
<script type="text/javascript" src="assets/js/animate.js"></script>
<script type="text/javascript" src="assets/js/home.js"></script>
<script type="text/javascript" src="assets/js/ajax.js"></script>
</body>
</html>
