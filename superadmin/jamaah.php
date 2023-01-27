<?php
session_start();
include "../koneksi.php";
$role = $_SESSION['role'];
if($_SESSION['role'] != "1"){
    header("location:../logout.php");
}
$id_aktor = $_SESSION['id_aktor'];
$hasil = mysqli_query($koneksi, "SELECT * FROM jamaah where status_pembayaran='pending'");
$jumlah_pembayaran_belum = mysqli_num_rows($hasil);
$hsl = mysqli_query($koneksi, "SELECT * FROM jamaah where status_pembayaran='ditolak'");
$jumlah_ditolak = mysqli_num_rows($hsl);
$has = mysqli_query($koneksi, "SELECT * FROM jamaah where status_pembayaran='diterima'");
$jumlah_jamaah = mysqli_num_rows($has);
require('componen_admin/header.php');
?>


            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <div class="row">
                            <a href="konfirmasi_jamaah.php">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xm-12">
                                <!--Registered User-->
                                <div class="panel media pad-all">
                                    <div class="media-left">
                                        <!-- <span class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                        <i class="fa fa-file"></i> -->
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h4>Pembayaran Belum Terkonfirmasi</h4>
                                        <h1 style="color:blue;"><?php echo $jumlah_pembayaran_belum ?></h1>
                                        <!-- <p class="text-2x mar-no text-thin text-right"><i class="fa fa-file"></i></p>
                                        <p class="h5 mar-no text-right"><a href="dataPengajuan.php">Diterima</a></p> -->
                                    </div>
                                </div>
                            </div></a>
                            <!-- <div class="row"> -->
                            <a href="data_ditolak.php">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xm-12">
                                <!--Registered User-->
                                <div class="panel media pad-all">
                                    <div class="media-left">
                                        <!-- <span class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                        <i class="fa fa-file"></i> -->
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h4>Data <br> Pembayaran Ditolak</h4>
                                        <h1 style="color:red;"><?php echo $jumlah_ditolak ?></h1>
                                        <!-- <p class="text-2x mar-no text-thin text-right"><i class="fa fa-file"></i></p>
                                        <p class="h5 mar-no text-right"><a href="dataPengajuan.php">Diterima</a></p> -->
                                    </div>
                                </div>
                            </div></a>
                            <a href="data_jamaah.php">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xm-12">
                                <!--Registered User-->
                                <div class="panel media pad-all">
                                    <div class="media-left">
                                        <!-- <span class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                        <i class="fa fa-file"></i> -->
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h4>Data <br>Jamaah<br>Diterima</h4>
                                        <h1 style="color:green;"><?php echo $jumlah_jamaah ?></h1>
                                        <!-- <p class="text-2x mar-no text-thin text-right"><i class="fa fa-file"></i></p>
                                        <p class="h5 mar-no text-right"><a href="dataPengajuan.php">Diterima</a></p> -->
                                    </div>
                                </div>
                            </div></a>
                        </div>
                     </div>
                    <!--===================================================-->
                    <!--End page content-->
                </div>
                    <!--===================================================-->
                    <!--End page content-->
                <!--===================================================-->
                <!--END CONTENT CONTAINER-->
                <?php
                require('componen_admin/navigasi.php');
                ?>

<?php
    require('componen_admin/footer.php');
?>
                