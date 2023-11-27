<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($conn, "SELECT * FROM siswa ORDER BY id_siswa DESC");
?>
<?php include('header.php'); ?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> <small>DATA SISWA</small></h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
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
                        <h2>Data Siswa</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li class="dropdown">

                                <a class="dropdown-item" href="tambah_siswa.php"><i class="fa fa-plus"></i>
                                    Tambah</a>



                            </li>
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <?php
                                    // Check if there is a success parameter in the URL
                                    if (isset($_GET['success'])) {
                                        if ($_GET['success'] == 1) {
                                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Data berhasil disimpan!
                                                  </div>';
                                        } else if ($_GET['success'] == 2) {
                                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Data berhasil diubah!
                                                  </div>';
                                        }
                                         else if ($_GET['success'] == 3) {
                                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Data berhasil dihapus!
                                                  </div>';
                                        }
                                    }
                                    ?>

                                    <!-- <p class="text-muted font-13 m-b-30">
                                        DataTables has most features enabled by default, so all you need to do to use it
                                        with your own tables is to call the construction function:
                                        <code>$().DataTable();</code>
                                    </p> -->
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php  
                                            $rowNumber = 1;
                                                while($user_data = mysqli_fetch_array($result)) { ?>
                                            <tr>
                                                <td><?php echo $rowNumber; ?> </td>
                                                <td><?php echo $user_data['nis']; ?></td>
                                                <td><?php echo $user_data['nama_siswa']; ?></td>
                                                <td>
                                                    <a class="btn btn-info btn-sm"
                                                        href='ubah_siswa.php?id=<?php echo $user_data['id_siswa']; ?>'><i
                                                            class="fa fa-edit"></i></a>

                                                    <a class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Apa yakin ingin menghapus data ini?')"
                                                        href='del_siswa.php?id=<?php echo $user_data['id_siswa']; ?>'><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php $rowNumber++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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