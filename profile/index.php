<?php
session_start();
if (isset($_SESSION["auth_id"])){
    
    $auth_code = $_SESSION["auth_id"];
    
    //Fetch details from DB
    @require("./../root/db.php");
    $result = $conn->query("SELECT * FROM registration WHERE auth = '$auth_code'");
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $fname = "".$row["fname"]."";
            $lname = "".$row["lname"]."";
        }
    } else {
        session_unset();
        header("location:/KalamAcademy/");
    }
    
} else {
    header("location:/KalamAcademy/");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

<!--TITLE-->
<title><?php print("$fname $lname"); ?></title>

<!--SHORTCUT ICON-->
<link rel="shortcut icon" href="../assets/images/favicon.ico" />

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
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

<!--GOOGLE FONTS-->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

<!--STYLE SHEET-->
<link rel="stylesheet" href="../assets/css/main.css" />
<link rel="stylesheet" href="../assets/css/animate.css" />
<link rel="stylesheet" href="../assets/css/profile.css" />

</head>
<body>

<!--HEADER-->
<header class="padding_1x">
    <aside class="flex buttons">
        <button class="btn btn_1" onclick="modal('post')"><i class="fa fa-plus"></i> Post to story</a>
        <button class="icon" title="LogOut" onclick="call_ajax('logout')"><iconify-icon icon="uiw:logout"></iconify-icon></a>
    </aside>
</header>

<!--MAIN-->
<main class="padding_2x">
    <div class="divisions division_1 flex">
        <section class="author_details padding_2x">
            <figure>
                <img src="assets/images/author.jpg" alt="" />
                <label>
                    <iconify-icon icon="material-symbols:camera-outline"></iconify-icon>
                    <input type="file" name="dp" />
                </label>
            </figure>
            <h1 class="title small"><?php print("$fname $lname"); ?></h1>
        </section>
        <section class="flex_content">
            <ul class="friends_suggestion fixed_flex">
                <li>
                    <figure>
                        <img src="assets/images/author.jpg" alt="" />
                    </figure>
                    <article class="padding_1x">
                        <h4 class="title">Arun kumar</h4>
                        <a href="#" class="btn btn_3">Add friend</a>
                    </article>
                </li>
                <li>
                    <figure>
                        <img src="assets/images/author.jpg" alt="" />
                    </figure>
                    <article class="padding_1x">
                        <h4 class="title">Arun kumar</h4>
                        <a href="#" class="btn btn_3">Add friend</a>
                    </article>
                </li>
                <li>
                    <figure>
                        <img src="assets/images/author.jpg" alt="" />
                    </figure>
                    <article class="padding_1x">
                        <h4 class="title">Arun kumar</h4>
                        <a href="#" class="btn btn_3">Add friend</a>
                    </article>
                </li>
                <li>
                    <figure>
                        <img src="assets/images/author.jpg" alt="" />
                    </figure>
                    <article class="padding_1x">
                        <h4 class="title">Arun kumar</h4>
                        <a href="#" class="btn btn_3">Add friend</a>
                    </article>
                </li>
                <li>
                    <figure>
                        <img src="assets/images/author.jpg" alt="" />
                    </figure>
                    <article class="padding_1x">
                        <h4 class="title">Arun kumar</h4>
                        <a href="#" class="btn btn_3">Add friend</a>
                    </article>
                </li>
                <li>
                    <figure>
                        <img src="assets/images/author.jpg" alt="" />
                    </figure>
                    <article class="padding_1x">
                        <h4 class="title">Arun kumar</h4>
                        <a href="#" class="btn btn_3">Add friend</a>
                    </article>
                </li>
                
                <li>
                    <figure>
                        <img src="assets/images/author.jpg" alt="" />
                    </figure>
                    <article class="padding_1x">
                        <h4 class="title">Arun kumar</h4>
                        <a href="#" class="btn btn_3">Add friend</a>
                    </article>
                </li>
                <li>
                    <figure>
                        <img src="assets/images/author.jpg" alt="" />
                    </figure>
                    <article class="padding_1x">
                        <h4 class="title">Arun kumar</h4>
                        <a href="#" class="btn btn_3">Add friend</a>
                    </article>
                </li>
                <li>
                    <figure>
                        <img src="assets/images/author.jpg" alt="" />
                    </figure>
                    <article class="padding_1x">
                        <h4 class="title">Arun kumar</h4>
                        <a href="#" class="btn btn_3">Add friend</a>
                    </article>
                </li>
            </ul>
        </section>
    </div>
</main>

<!--JAVASCRIPT-->
<script type="text/javascript" src="../assets/js/main.js"></script>
<script type="text/javascript" src="../assets/js/animate.js"></script>
<script type="text/javascript" src="../assets/js/profile.js"></script>
<script type="text/javascript" src="../assets/js/ajax.js"></script>
</body>
</html>
