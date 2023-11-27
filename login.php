<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SPK Fuzzy </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
</head>
<style>
body.login {
    background: linear-gradient(to right, #ccffe3, #9bfc94);
    /* Ganti warna atau nilai sesuai kebutuhan */
    /* color: #fff; */
    /* Untuk memberi warna teks putih agar terlihat dengan baik di atas gradien */
}

.small-container {
    width: 100%px;
    margin-left: 15px;
    /* Sesuaikan ukuran margin kiri */
    margin-right: 15px;
    /* Sesuaikan ukuran margin kanan */
}

/* Gaya lain yang mungkin sudah Anda tentukan sebelumnya */
.form-control {
    width: 100%;
    box-sizing: border-box;
    padding: 8px;
    /* Sesuaikan dengan kebutuhan Anda */
    margin-bottom: 10px;
    /* Sesuaikan dengan kebutuhan Anda */
}
</style>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form"
                style="border: 3px solid white; border-radius: 10px; background-color: white;">
                <section class="login_content">
                    <?php
                      if (!empty($_GET["alert"])) {
                      $alertMessage = htmlspecialchars($_GET["alert"]);
                      }
                    ?>

                    <?php if (!empty($alertMessage)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $alertMessage; ?>
                    </div>
                    <?php endif; ?>
                    <form action="aksi_login.php" method="post">
                        <h1>Login Form</h1>
                        <div class="small-container">
                            <input type="text" class="form-control" name="username" placeholder="Username"
                                required="" />
                        </div>
                        <div class="small-container">
                            <input type="password" name="password" class="form-control" placeholder="Password"
                                required="" />
                        </div>
                        <div>
                            <button class="btn btn-success submit">Log in</button>
                            <a class="reset_pass" href="#">Lost your password?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">New to site?
                                <a href="#" class="to_register"> Create Account </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <!-- <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1> -->
                                <p>©<?php
                                echo date("Y");
                                    ?>
                                    All Rights Reserved. Created_by Ayu Nahas</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>

            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <form>
                        <h1>Create Account</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="email" class="form-control" placeholder="Email" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            <a class="btn btn-default submit" href="index.html">Submit</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Already a member ?
                                <a href="#signin" class="to_register"> Log in </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <!-- <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1> -->
                                <p>©<?php
                echo  date("Y");
?> All Rights Reserved. Created_by Ayu Nahas</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>