<!-- page content -->
<?php
include_once("config.php");

$query = "SELECT COUNT(*) as total_siswa FROM siswa";
$result = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));
$totalSiswa = mysqli_fetch_assoc($result)['total_siswa'];

$query = "SELECT COUNT(*) as total_matpel FROM matpel";
$result = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));
$totalmatpel = mysqli_fetch_assoc($result)['total_matpel'];

$tampilnilai = mysqli_query($conn, "SELECT nilai.*, siswa.*, siswa.nama_siswa FROM nilai JOIN siswa ON nilai.id_siswa = siswa.id_siswa  ORDER BY nilai.id_nilai DESC");

?>
<?php
 
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
        $id_siswa = $_POST['id_siswa'];
    $nilai_mtk = $_POST['nilai_mtk'];
    $nilai_bindo = $_POST['nilai_bindo'];
    $nilai_bing = $_POST['nilai_bing'];
    $nilai_ipa = $_POST['nilai_ipa'];
  




    // include database connection file
    include_once("config.php");

    // Insert user data into table
    $result = mysqli_query($conn, "INSERT INTO nilai (id_siswa,nilai_mtk,nilai_bindo,nilai_bing,nilai_ipa) VALUES('$id_siswa', '$nilai_mtk','$nilai_bindo','$nilai_bing','$nilai_ipa')");

    // Check for errors in the query
    if($result) {
        // If successful, redirect to view_siswa.php
        header("Location: index.php?success=1");
        exit(); // Ensure that no more code is executed after redirection
    } else {
        // Display an error message and provide a link to go back
        echo "Error: " . mysqli_error($conn) . "<br>";
        echo "<a href='javascript:history.go(-1)'>Go Back</a>";
    }
}
?>
<?php require_once "header.php"; ?>

<div class="right_col" role="main">
    <!-- top tiles -->
    <!-- <center>
        <div class="row">
            <div class="tile_count">
                <div class="col-sm-6  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Siswa</span>
                    <div class="count">dd</div>
                    <span class="count_bottom"><i class="green"> dd</i> Total Siswa</span>
                </div>
                <div class="col-sm-6  tile_stats_count">
                    <span class="count_top"><i class="fa fa-clock-o"></i> Total Matpel</span>
                    <div class="count">ff</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>ff
                        </i> Total Matpel</span>
                </div>
                <div class="col-sm-6  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Admin</span>
                <div class="count green">2,500</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>  

            </div>
        </div>
    </center> -->
    <!-- /top tiles -->
    <div class="row">
        <div class="col-sm-12">


            <!-- page content -->
            <div role="main">
                <div class="">
                    <div style="text-align: center;">
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
                        <h1>Daftar Nilai</h1>
                        <hr>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form Tambah Data Nilai </h2>
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
                                    <form method="post" action="index.php" name="form1" data-parsley-validate
                                        class="form-horizontal form-label-left">

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="first-name"> Nama Siswa
                                                    <span class="required">*</span>
                                                </label>

                                                <select id="id_siswa" name="id_siswa" class="form-control" required>
                                                    <option disabled value="">Silahkan Pilih</option>

                                                    <?php
       
                                                    include_once("config.php");
                                                    $get = mysqli_query($conn, "SELECT * FROM siswa ORDER BY id_siswa DESC");
                                                    while ($r = mysqli_fetch_array($get)) { ?>


                                                    <option value="<?php echo $r['id_siswa']; ?>">
                                                        <?php echo $r['nama_siswa']; ?>
                                                    </option>

                                                    <?php } ?>


                                                </select>

                                                <label for="last-name">Nilai Matematika
                                                    <span class="required">*</span>
                                                </label>

                                                <input type="number" id="nilai_mtk" name="nilai_mtk" required="required"
                                                    class="form-control">

                                                <label for="last-name">Nilai Bahasa Indonesia
                                                    <span class="required">*</span>
                                                </label>

                                                <input type="number" id="nilai_bindo" name="nilai_bindo"
                                                    required="required" class="form-control">

                                                <label for="last-name">Nilai Bahasa Inggris
                                                    <span class="required">*</span>
                                                </label>

                                                <input type="number" id="nilai_bing" name="nilai_bing"
                                                    required="required" class="form-control">

                                                <label for="last-name">Nilai IPA
                                                    <span class="required">*</span>
                                                </label>

                                                <input type="number" id="nilai_ipa" name="nilai_ipa" required="required"
                                                    class="form-control">




                                            </div>

                                        </div>

                                </div>
                                <br>

                                <!-- <button class="btn btn-danger btn-sm" type="button"><i class="fa fa-times"></i></button> -->
                                <button class="btn btn-primary btn-sm" type="reset"><i
                                        class="fa fa-refresh"></i></button>
                                <button type="submit" name="Submit" value="Add" class="btn btn-success btn-sm"><i
                                        class="fa fa-send"></i> Simpan</button>

                            </div>

                            </form>
                        </div>
                        <div class="col-sm-8">
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama</th>
                                        <th>MTK</th>
                                        <th>BINDO</th>
                                        <th>BING</th>
                                        <th>IPA</th>
                                        <th>Jurusan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $rowNumber=1;
                                // Fungsi keanggotaan untuk variabel input (nilai mata pelajaran)
                                function fuzzifikasi($nilai) {
                                    $rendah = max(0, min(1, (60 - $nilai) / 20));
                                    $sedang = max(0, min(1, ($nilai - 40) / 20));
                                    $tinggi = max(0, min(1, ($nilai - 60) / 20));

                                    return ['rendah' => $rendah, 'sedang' => $sedang, 'tinggi' => $tinggi];
                                }

                                // Aturan Fuzzy
                                function aturanFuzzy($fuzzy_mtk, $fuzzy_bing, $fuzzy_ipa, $fuzzy_bindo) {
                                    // Aturan fuzzy disesuaikan dengan kebutuhan
                                    $output_TKJ = ($fuzzy_mtk['tinggi'] + $fuzzy_bing['tinggi'] + $fuzzy_ipa['tinggi'] + $fuzzy_bindo['tinggi']) / 4;
                                    $output_RPL = ($fuzzy_mtk['sedang'] + $fuzzy_bing['tinggi'] + $fuzzy_ipa['sedang']) / 3;
                                    $output_TSM = ($fuzzy_mtk['tinggi'] + $fuzzy_bing['sedang'] + $fuzzy_ipa['tinggi']) / 3;
                                    $output_TBO = ($fuzzy_mtk['rendah'] + $fuzzy_bing['rendah'] + $fuzzy_ipa['rendah'] + $fuzzy_bindo['rendah']) / 4;
                                    $output_TKR = ($fuzzy_mtk['rendah'] + $fuzzy_bing['rendah'] + $fuzzy_ipa['rendah']) / 3;
                                    $output_KI = ($fuzzy_mtk['sedang'] + $fuzzy_bing['tinggi'] + $fuzzy_ipa['rendah'] + $fuzzy_bindo['rendah']) / 4;

                                    // Defuzzifikasi (nilai tertinggi)
                                    $nilai_output = max($output_TKJ, $output_RPL, $output_TSM, $output_TBO, $output_TKR, $output_KI);

                                    // Pemilihan jurusan berdasarkan output tertinggi
                                    if ($nilai_output == $output_TKJ) {
                                        return 'TKJ';
                                    } elseif ($nilai_output == $output_RPL) {
                                        return 'RPL';
                                    } elseif ($nilai_output == $output_TSM) {
                                        return 'TSM';
                                    } elseif ($nilai_output == $output_TBO) {
                                        return 'TBO';
                                    } elseif ($nilai_output == $output_TKR) {
                                        return 'TKR';
                                    } else {
                                        return 'KI';
                                    }
                                }
                                // Contoh penggunaan di dalam loop
                                while ($user_data = mysqli_fetch_array($tampilnilai)) {
                                    // Fuzzifikasi nilai mata pelajaran
                                    $fuzzy_mtk = fuzzifikasi($user_data['nilai_mtk']);
                                    $fuzzy_bing = fuzzifikasi($user_data['nilai_bing']);
                                    $fuzzy_ipa = fuzzifikasi($user_data['nilai_ipa']);
                                    $fuzzy_bindo = fuzzifikasi($user_data['nilai_bindo']);
                                    // Aturan Fuzzy
                                    $jurusan = aturanFuzzy($fuzzy_mtk, $fuzzy_bing, $fuzzy_ipa, $fuzzy_bindo);
                                ?>

                                    <tr>
                                        <!-- ... -->
                                        <td><?php echo $rowNumber; ?> </td>
                                        <td><?php echo $user_data['nama_siswa']; ?></td>
                                        <td>
                                            <?php echo $user_data['nilai_mtk']; ?><br>

                                        </td>
                                        <td>
                                            <?php echo $user_data['nilai_bindo']; ?><br>

                                        </td>
                                        <td>
                                            <?php echo $user_data['nilai_bing']; ?><br>

                                        </td>
                                        <td>
                                            <?php echo $user_data['nilai_ipa']; ?><br>

                                        </td>
                                        <td><?php echo $jurusan; ?></td>

                                        <td>
                                            <!-- <a class="badge badge-info" style="font-size: 14px;" data-toggle="modal"
                                                data-target=".bs-example-modal-lg<?php echo $user_data['id_nilai']; ?>"
                                                href='ubah_nilai.php?id=<?php echo $user_data['id_nilai']; ?>'><i
                                                    class="fa fa-edit"></i></a> -->

                                            <a class="badge badge-danger" style="font-size: 14px;"
                                                onclick="return confirm('Apa yakin ingin menghapus data ini?')"
                                                href='del_nilai.php?id=<?php echo $user_data['id_nilai']; ?>'><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <div class="modal fade bs-example-modal-lg<?php echo $user_data['id_nilai']; ?>"
                                        tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Ubah Data
                                                        <?php echo $user_data['nama_siswa']; ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal"><span
                                                            aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="x_panel">
                                                        <div class="x_title">
                                                            <h2>Form Tambah Data Nilai </h2>
                                                            <ul class="nav navbar-right panel_toolbox">
                                                                <li><a class="collapse-link"><i
                                                                            class="fa fa-chevron-up"></i></a>
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
                                                                <li><a class="close-link"><i
                                                                            class="fa fa-close"></i></a>
                                                                </li>
                                                            </ul>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="x_content">
                                                            <br />
                                                            <form method="post" action="index.php" name="form1"
                                                                data-parsley-validate
                                                                class="form-horizontal form-label-left">

                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <label for="first-name"> Nama Siswa
                                                                            <span class="required">*</span>
                                                                        </label>

                                                                        <input type="text" id="id_siswa" name="id_siswa"
                                                                            required="required"
                                                                            value=" <?php echo $user_data['id_siswa']; ?>"
                                                                            class="form-control">

                                                                        <label for="last-name">Nilai Matematika
                                                                            <span class="required">*</span>
                                                                        </label>

                                                                        <input type="number" id="nilai_mtk"
                                                                            name="nilai_mtk" required="required"
                                                                            class="form-control">

                                                                        <label for="last-name">Nilai Bahasa Indonesia
                                                                            <span class="required">*</span>
                                                                        </label>

                                                                        <input type="number" id="nilai_bindo"
                                                                            name="nilai_bindo" required="required"
                                                                            class="form-control">

                                                                        <label for="last-name">Nilai Bahasa Inggris
                                                                            <span class="required">*</span>
                                                                        </label>

                                                                        <input type="number" id="nilai_bing"
                                                                            name="nilai_bing" required="required"
                                                                            class="form-control">

                                                                        <label for="last-name">Nilai IPA
                                                                            <span class="required">*</span>
                                                                        </label>

                                                                        <input type="number" id="nilai_ipa"
                                                                            name="nilai_ipa" required="required"
                                                                            class="form-control">




                                                                    </div>

                                                                </div>

                                                        </div>
                                                        <br>

                                                        <!-- <button class="btn btn-danger btn-sm" type="button"><i class="fa fa-times"></i></button> -->
                                                        <button class="btn btn-primary btn-sm" type="reset"><i
                                                                class="fa fa-refresh"></i></button>
                                                        <button type="submit" name="Submit" value="Add"
                                                            class="btn btn-success btn-sm"><i class="fa fa-send"></i>
                                                            Simpan</button>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <?php $rowNumber++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- /page content -->


</div>

<?php include('footer.php'); ?>