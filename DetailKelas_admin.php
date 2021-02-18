<html>
    <head>
        <?php
            require_once "commons/Function.php";

            if (!isset($_SESSION['logged_in'])){
                header("location: login.php");
            }
            $_SESSION['kelas'] = $_GET['kelas'];
            $AllLaporan = getLaporan($_GET['kelas']);
        ?>
        <title>Pilih Kelas</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/myStyle.css">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <style>
            th{
                color:black;
                font-size:18px;
                text-align:center;
            }
            .table_header{
                font-size:18px;
                color:black;
                width:15%;
                text-align:center;
                text-decoration: bold;
            }
            .data{
                text-align:center;
                color:black;
                width: 10%;
                font-size:14px;
            }
            td{
                color:black;
            }
            .margin-td{
                margin:5px 5px 0px 0px;
            }
        </style>
    </head>
    <body style="color:white">
        <div class="container">
            <?php require('commons/header.php')?>
            <div class="col-md-12 content box-shadow" style="margin:5px 0px 5px 0px;padding:0px">
                <?php require('commons/menu.php')?>
                <div class="col-md-10">
                    <ul class="breadcrumb box-shadow" style="font-size: 13px;">
                        <li><a href="Dashboard.php" style="text-decoration: none;color:white;">Dashboard</a></li>
                        <li><a href="PilihKelas.php?angkatan=<?= $_GET['angkatan'] ?>" style="text-decoration: none;color:white;">Pembagian Kelas</a></li>
                        <!-- <li><a href="#" style="text-decoration: none;color:white;">Kelas</a></li> -->
                        <li><a href="#" style="text-decoration: none;color:white;"><?= $_GET['kelas']; ?></a></li>
                    </ul>
                    <a href="PilihKelas.php?angkatan=<?= $_GET['angkatan'] ?>"><div class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp Kembali</div></a>
                    <!-- Constent Start Here -->
                    <!-- <a href="AbsensiKelas.php?kelas=<?= $_GET['kelas'] ?>&angkatan=<?= $_GET['angkatan'] ?>"><button class="btn btn-primary"> Lakukan Absensi </button></a> -->
                    <table style="width:100%">
                        <tr style="border-bottom:2px solid black;height:40px;">
                            <td class='data table_header' style="width:5%;font-size:18px;"><b>No</b></td>
                            <td class="table_header"><b>ID Absensi</b></td>
                            <td class="table_header" style="text-align:center;width:20%"><b>Guru</b></td>
                            <td class="table_header" style="text-align:center"><b>ID Jadwal</b></td>
                            <td class="table_header" style="text-align:center"><b>Tanggal</b></td>
                            <td class="table_header" style="text-align:center"><b>Kelas</b></td>
                        </tr>
                        <?php 
                            $i = 1;
                            foreach($AllLaporan  as $laporan){ ?>
                        <tr>
                           <td class="data" style="width:5%"><div class="thumbnail margin-td"><?= $i; ?></div></td>
                           <td><div class="thumbnail margin-td" style="text-align:center"><?= $laporan['id_absensi']; ?></div></td>
                           <td class="data"><div class="thumbnail margin-td" ><?= $laporan['kode_guru']; ?></div></td>
                           <td class="data"><div class="thumbnail margin-td" ><?= $laporan['id_jadwal']; ?></div></td>
                           <td class="data"><div class="thumbnail margin-td" ><?= $laporan['tanggal']; ?></div></td>
                           <td class="data"><div class="thumbnail margin-td" ><?= $laporan['kelas']; ?></div></td>
                           <td>
                               <a href="CetakLaporan.php?tanggal=<?= $laporan['tanggal']; ?>&id=<?= $laporan['id_absensi'];?>">
                                <div class="btn btn-success box-shadow" style=" margin-top: 4px"><span class="glyphicon glyphicon-print">&nbsp</span>Cetak Laporan</div>
                               </a>
                            </td>
                        </tr>
                        <?php 
                            ++$i;
                            } ?>
                    </table>
                    <!-- Contents End Here -->
                </div>
            </div>
            <?php require('commons/footer.php')?>
        </div>
    </body>
</html>