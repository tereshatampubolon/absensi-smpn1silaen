<html>
    <head>
        <title>Pilih Kelas</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/myStyle.css">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>

       <style>
           h2,td{
                color:black;
           }
           /* td{
               width:200px;
           } */
           .table-gap{
               margin-bottom:30px; 
           }
           .color1{
               background-color: #ccf5ff;
           }
           .color2{
               background-color: #b3f0ff;
           }
       </style>   
    </head>
    <?php
        
    ?>
    <body style="color:white">
        <div class="container">
            <?php require('commons/header.php')?>
            <div class="col-md-12 content box-shadow" style="margin:5px 0px 5px 0px;padding:0px">
                <?php require('commons/menu.php')?>
                <div class="col-md-10">
                        <ul class="breadcrumb box-shadow">
                            <li><a href="Dashboard.php" style="text-decoration: none;color:white;">Dashboard</a></li>
                            <li><a href="PilihKelas.php?angkatan=<?= $_GET['angkatan']; ?>" style="text-decoration: none;color:white;">Pembagian Kelas</a></li>
                            <li><a href="DetailKelas.php?kelas=<?= $_GET['kelas']; ?>&angkatan=<?= $_GET['angkatan']; ?>" style="text-decoration: none;color:white;"><?= $_GET['kelas']; ?></a></li>
                            <li><a href="#" style="text-decoration: none;color:white;">Detail Siswa</a></li>
                        </ul>
                         <!-- CONTENTS START HERE -->
                    <div class="row" style="margin-left:5%;margin-top:-30px;">
                    <?php 
                        $NISN = $_GET['kode'];
                        $siswa = getAllSiswaInfo($NISN);
                    ?>
                        <h2>Data Siswa</h2>
                            <table class="table-gap" style="width:90%;">
                                <tr>
                                    <td class="color1" style="width:22%"><b>NISN</b></td>
                                    <td style="max-width:5px;"></td>
                                    <td class="color1" style="width:80%"><?= $siswa['NISN']; ?></td>
                                </tr>
                                <tr>
                                    <td class="color2"><b>Nama</b></td>
                                    <td style="width:5px;"></td>
                                    <td class="color2"><?= $siswa['Nama']; ?></td>
                                </tr>
                                <tr>
                                    <td class="color1"><b>Kelas</b></td>
                                    <td style="width:5px;"></td>
                                    <td class="color1"><?= $siswa['kelas']; ?></td>
                                </tr>
                                <tr>
                                    <td class="color2"><b>Tempat,Tanggal Lahir</b></td>
                                    <td style="width:5px;"></td>
                                    <td class="color2"><?= $siswa['tempat_lahir'].",".$siswa['tanggal_lahir']; ?></td>
                                </tr>
                                <tr>
                                    <td class="color1"><b>Jumlah Saudara</b></td>
                                    <td style="width:5px;"></td>
                                    <td class="color1"><?= $siswa['jlh_saudara']; ?></td>
                                </tr>
                                <tr>
                                    <td class="color2"><b>Anak Ke</b></td>
                                    <td style="width:5px;"></td>
                                    <td class="color2"><?= $siswa['anak_ke']; ?></td>
                                </tr>
                                <tr>
                                    <td class="color1"><b>No KK</b></td>
                                    <td style="width:5px;"></td>
                                    <td class="color1"><?= $siswa['no_KK']; ?></td>
                                </tr>
                                <tr>
                                    <td class="color2"><b>Alamat</b></td>
                                    <td style="width:10px;"></td>
                                    <td class="color2"><?= $siswa['alamat'] ?></td>
                                </tr>
                            </table>
                        <h2>Data Orangtua</h2>
                            <table class="table-gap" style="width:90%">
                                <tr>
                                    <td class="color1"><b>No KK</b></td>
                                    <td style="width:10px;"></td>
                                    <td class="color1"><?= $siswa['no_KK'] ?></td>
                                </tr>
                                <tr>
                                    <td class="color2"><b>Alamat Keluarga</b></td>
                                    <td style="width:10px;"></td>
                                    <td class="color2"><?= $siswa['alamat'] ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><h4>Ayah</h4></td>
                                </tr>
                                <tr>
                                    <td class="color1" style="width:22%;"><b>NIK</b></td>
                                    <td style="width:10px;"></td>
                                    <td class="color1"  style="width:80%"><?= $siswa['NIK_ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td class="color2"><b>Nama</b></td>
                                    <td style="width:10px;"></td>
                                    <td class="color2"><?= $siswa['nama_Ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td class="color1"><b>Pekerjaan</b></td>
                                    <td style="width:10px;"></td>
                                    <td class="color1"><?= $siswa['pekerjaan_Ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td class="color2"><b>Penghasilan</b></td>
                                    <td style="width:10px;"></td>
                                    <td class="color2"><?= $siswa['penghasilan_Ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td class="color1"><b>No Telepon</b></td>
                                    <td style="width:10px;"></td>
                                    <td class="color1"><?= $siswa['no_telepon_Ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><h4>Ibu</h4></td>
                                </tr>
                                <tr>
                                    <td class="color2"><b>NIK</b></td>
                                    <td style="width:10px;"></td>
                                    <td class="color2"><?= $siswa['NIK_Ibu'] ?></td>
                                </tr>
                                <tr>
                                    <td class="color1"><b>Nama</b></td>
                                    <td style="width:10px;"></td>
                                    <td class="color1"><?= $siswa['nama_Ibu'] ?></td>
                                </tr>
                                <tr>
                                    <td class="color2"><b>Pekerjaan</b></td>
                                    <td style="width:10px;"></td>
                                    <td class="color2"><?= $siswa['pekerjaan_Ibu'] ?></td>
                                </tr>
                                <tr>
                                    <td class="color1"><b>Penghasilan</b></td>
                                    <td style="width:10px;"></td>
                                    <td class="color1"><?= $siswa['penghasilan_Ibu'] ?></td>
                                </tr>
                                <tr>
                                    <td class="color2"><b>No Telepon</b></td>
                                    <td style="width:10px;"></td>
                                    <td class="color2"><?= $siswa['no_telepon_Ibu'] ?></td>
                                </tr>    
                            </table>
                    </div>
                    </div>
            </div>
            <?php require('commons/footer.php')?>
        </div>
    </body>
</html>