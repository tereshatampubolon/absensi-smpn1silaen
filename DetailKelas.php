<html>
    <head>
        <?php
            require_once "commons/Function.php";

            if (!isset($_SESSION['logged_in'])){
                header("location: login.php");
            }
            $_SESSION['kelas'] = $_GET['kelas'];
            $AllSiswa = getKelas($_GET['kelas']);
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
                max-width:200px;
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
                    <a href="AbsensiKelas.php?kelas=<?= $_GET['kelas'] ?>&angkatan=<?= $_GET['angkatan'] ?>"><button class="btn btn-primary"> Lakukan Absensi </button></a>
                    <table style="width:100%">
                        <tr style="border-bottom:2px solid black;height:40px;">
                            <td class='data table_header' style="width:5%;font-size:18px;"><b>No</b></td>
                            <td class="table_header"><b>NISN</b></td>
                            <td class="table_header" style="text-align:left;width:60%"><b>Nama</b></td>
                            <!-- <td class="table_header" style="text-align:left"><b>Kelas</b></td>
                            <td class="table_header" style="text-align:left;width:200px;"><b>Tempat,Tanggal Lahir</b></td>
                            <td class="table_header" style="text-align:left"><b>Alamat</b></td> -->
                            <td></td>
                        </tr>
                        <?php 
                            $i = 1;
                            foreach($AllSiswa  as $siswa){ ?>
                        <tr>
                           <td class="data" style="width:5%"><div class="thumbnail margin-td"><?= $i; ?></div></td>
                           <td class="data"><div class="thumbnail margin-td" ><?= $siswa['NISN']; ?></div></td>
                           <td><div class="thumbnail margin-td" ><?= $siswa['Nama']; ?></div></td>
                           <!-- <td><?= $siswa['kelas']; ?></td>
                           <td><?= $siswa['tempat_lahir'].','.$siswa['tanggal_lahir']; ?></td>
                           <td><?= $siswa['alamat']; ?></td> -->
                           <td>
                               <a href="DetailSiswa.php?kode=<?= $siswa['NISN']; ?>&kelas=<?= $_GET['kelas'];?>&angkatan=<?= $_GET['angkatan']; ?>">
                                <div class="btn btn-success box-shadow" style=" margin-top: 4px">Lihat Siswa</div>
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