<html>
    <head>
        <?php
            require_once "commons/Function.php";

            if (!isset($_SESSION['logged_in'])){
                header("location: login.php");
            }

            $AllSiswa = getKelas($_GET['kelas']);
        ?>
        <title>Pilih Kelas</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/myStyle.css">
        <link rel="stylesheet" href="css/buttonStyle.css">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <style>
            th{
                color:black;
                font-size:18px;
                text-align:center;
            }
            .data{
                text-align:center;
                color:black;
                width: 10%;
                font-size:14px;
            }
            td{
                height:50px;
            }
            .data-nama{
                text-align:left;
                color:black;
                width: 10%;
                font-size:14px;
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
                            <!-- <li><a href="#" style="text-decoration: none;color:white;">Kelas</a></li> -->
                            <li><a href="PilihKelas.php?angkatan=<?= $_GET['angkatan']; ?>" style="text-decoration: none;color:white;">Pembagian Kelas</a></li>
                            <li><a href="DetailKelas.php?kelas=<?= $_GET['kelas']; ?>&angkatan=<?= $_GET['angkatan'] ?>" style="text-decoration: none;color:white;"><?= $_GET['kelas']; ?></a></li>
                            <li><a href="#" style="text-decoration: none;color:white;">Pengabsenan Kelas</a></li>
                    </ul>
                    <form method="POST" action="AllProcess.php?action=absensi&kelas=<?= $_GET['kelas']; ?>&angkatan=<?= $_GET['angkatan']; ?>">
                    <!-- <form action="ProcessAbsensi.php" method="post"> -->
                    <table style="width:100%">
                        <tr style="border-bottom:1px solid black;height:40px;">
                            <th style="width:5%">No</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th></th>
                            <th colspan="4">Keterangan Kehadiran</th>
                            <!-- <th>Izin</th>
                            <th>Sakit</th>
                            <th>Alpha</th> -->
                        </tr>
                        <?php 
                            $i = 1;
                            foreach($AllSiswa  as $siswa){ ?>
                        <tr style="border-bottom: 1px solid #ddd;">
                           <td class="data" style="width:5%"><?= $i; ?></td>
                           <td class="data"><?= $siswa['NISN']; ?></td>
                           <td class="data-nama" colspan="2"><?= $siswa['Nama']; ?></td>
                           <td class="data">
                               <center>
                                <input type="radio" name="kehadiran<?= $i; ?>" id="hadir<?= $i; ?>" class="btn_hadir" value="hadir" checked>
                                <label for="hadir<?= $i; ?>"></label>
                                </center>
                            </td>
                           <td class="data">
                            <center>
                                <input type="radio" name="kehadiran<?= $i; ?>" id="sakit<?= $i; ?>" class="btn_sakit"  value="sakit">
                                <label for="sakit<?= $i; ?>"></label>
                            </center>
                            </td>
                           <td class="data"><center>                                
                                <input type="radio" name="kehadiran<?= $i; ?>" id="izin<?= $i; ?>" class="btn_izin" value="izin">
                                <label for="izin<?= $i; ?>"></label>
                           <td class="data"><center>
                                <input type="radio" name="kehadiran<?= $i; ?>" id="alpha<?= $i; ?>" class="btn_alpha" value="alpha">
                                <label for="alpha<?= $i; ?>"></label>
                        </tr>
                        <?php 
                            ++$i;
                            } ?>
                    </table>
                    <button type="submit" class="btn btn-success" style="margin-top:20px;">Selesai</button>
                </form>
                </div>
            </div>
            <?php require('commons/footer.php')?>
        </div>
    </body>
</html>