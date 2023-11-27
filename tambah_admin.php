<?php
 
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
        $user = $_POST['username'];
        $password = $_POST['password'];
        // include database connection file
        $hashedPassword = md5($password);
        include_once("config.php");
        // Insert user data into table
        // var_dump($ss); die();
    $result = mysqli_query($conn, "INSERT INTO admin (username, password) VALUES('$user', '$hashedPassword')");

    // Check for errors in the query
    if($result) {
        // If successful, redirect to view_admin.php
        header("Location: view_admin.php?success=1");
        exit(); // Ensure that no more code is executed after redirection
    } else {
        // Display an error message and provide a link to go back
        echo "Error: " . mysqli_error($conn) . "<br>";
        echo "<a href='javascript:history.go(-1)'>Go Back</a>";
    }
}
	
?>
<?php include('header.php'); ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tambah Data Admin</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Tambah Data Admin </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="dropdown-item" href="#">Settings 1</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Settings 2</a>
                                    </li>
                                </ul> -->
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="post" action="tambah_admin.php" name="form1" data-parsley-validate
                            class="form-horizontal form-label-left">

                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="first-name">Username
                                        <span class="required">*</span>
                                    </label>

                                    <input type="text" id="first-name" name="username" required="required"
                                        class="form-control ">
                                    <br>
                                    <label for="last-name">Pasword
                                        <span class="required">*</span>
                                    </label>

                                    <input type="password" id="password" name="password" required="required"
                                        class="form-control">
                                    <br>
                                    <input type="checkbox" id="showPassword" onclick="togglePassword()"> Show Password

                                    <br>

                                </div>

                            </div>

                    </div>

                    <!-- <button class="btn btn-danger btn-sm" type="button"><i class="fa fa-times"></i></button> -->
                    <button class="btn btn-primary btn-sm" type="reset"><i class="fa fa-refresh"></i></button>
                    <button type="submit" name="Submit" value="Add" class="btn btn-success btn-sm"><i
                            class="fa fa-send"></i> Simpan</button>

                </div>

                </form>
            </div>
        </div>
    </div>
</div>


</div>
</div>
<!-- /page content -->
<script>
function togglePassword() {
    var passwordInput = document.getElementById("password");
    var showPasswordCheckbox = document.getElementById("showPassword");

    if (showPasswordCheckbox.checked) {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}
</script>

<!-- footer content -->
<?php include('footer.php'); ?>