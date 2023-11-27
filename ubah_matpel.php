<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id_matpel = $_POST['id_matpel'];
	$nama_matpel=$_POST['nama_matpel'];
	
		
	// update user data
	$result = mysqli_query($conn, "UPDATE matpel SET nama_matpel='$nama_matpel'WHERE id_matpel=$id_matpel");
	
	// Redirect to homepage to display updated user in list
	header("Location: view_matpel.php?success=2");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM matpel WHERE id_matpel=$id");
 
while($user_data = mysqli_fetch_array($result))
{
	

	$nama_matpel = $user_data['nama_matpel'];
}
?>
<?php include('header.php'); ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Data Mata Pelajaran</h3>
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
                        <h2>Form Edit Data Mata Pelajaran </h2>
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
                        <form method="post" action="ubah_matpel.php" name="update_user" data-parsley-validate
                            class="form-horizontal form-label-left">
                            <input type="hidden" name="id_matpel" value="<?php echo $_GET['id'];?>" <div class="row">
                            <div class="col-sm-12">
                                <label for="first-name">Nama Mata Pelajaran
                                    <span class="required">*</span>
                                </label>

                                <input type="text" id="first-name" value="<?php echo $nama_matpel;?>" name="nama_matpel"
                                    required="required" class="form-control ">
                                <br>



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