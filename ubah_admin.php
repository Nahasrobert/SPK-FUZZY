<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id_admin = $_POST['id_admin'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	// $email=$_POST['email'];
		
	// update user data
	$result = mysqli_query($conn, "UPDATE admin SET username='$username' WHERE id_admin=$id_admin");
	
	// Redirect to homepage to display updated user in list
	header("Location: view_admin.php?success=2");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin=$id");
 
while($user_data = mysqli_fetch_array($result))
{
	$user = $user_data['username'];
	// $id_admin = $user_data['id_admin'];

	$password = $user_data['password'];
}
?>
<?php include('header.php'); ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Data Admin</h3>
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
                        <h2>Form Edit Data Admin </h2>
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
                        <form method="post" action="ubah_admin.php" name="update_user" data-parsley-validate
                            class="form-horizontal form-label-left">
                            <input type="hidden" name="id_admin" value="<?php echo $_GET['id'];?>" <div class="row">
                            <div class="col-sm-12">
                                <label for="first-name">username
                                    <span class="required">*</span>
                                </label>

                                <input type="text" id="first-name" value="<?php echo $user;?>" name="username"
                                    required="required" class="form-control ">
                                <br>
                                <!-- <label for="last-name">Nama admin
                                    <span class="required">*</span>
                                </label> -->

                                <!-- <input type="text" value="<?php echo $password;?>" id="last-name" name="password"
                                    required="required" class="form-control"> -->


                            </div>

                    </div>

                    <!-- <button class="btn btn-danger btn-sm" type="button"><i class="fa fa-times"></i></button> -->
                    <button class="btn btn-primary btn-sm" type="reset"><i class="fa fa-refresh"></i></button>
                    <button type="submit" name="update" value="Add" class="btn btn-success btn-sm"><i
                            class="fa fa-send"></i> Simpan</button>

                </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>


</div>
</div>
<!-- /page content -->

<!-- footer content -->
<?php include('footer.php'); ?>