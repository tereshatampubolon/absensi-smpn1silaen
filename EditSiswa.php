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
           .table-gap{
               margin-bottom:30px; 
           }
           .color1{
               background-color: #ccf5ff;
           }
           .color2{
               background-color: #b3f0ff;
           }
           input{
               width:50%;
               height:40px;
               padding-left:20px;
               border-radius:7px;
               border:none;
               background-color: white;
               box-shadow: 0 2px 5px 0 rgba(0,0,0,0.1), 0 2px 10px 0 rgba(0,0,0,0.05);
           }
           .td-info{
                background-color: #08ff004f;
                box-shadow: 0 2px 5px 0 rgba(0,0,0,0.1), 0 2px 10px 0 rgba(0,0,0,0.05);
                border-radius:7px;
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
                            <li><a href="AllSiswa.php" style="text-decoration: none;color:white;">Semua Siswa</a></li>
                            <li><a href="#" style="text-decoration: none;color:white;">Edit Profil Siswa</a></li>
                        </ul>
                         <!-- CONTENTS START HERE -->
                         <a href="AllSiswa.php"><div class="btn btn-success" style="margin-bottom:15px;">
                            <span class="glyphicon glyphicon-arrow-left">&nbsp</span>Kembali</div>
                        </a>
                    <div class="row" style="margin-left:5%;margin-top:-30px;">
                    <?php 
                        $NISN = $_GET['kode'];
                        $siswa = getAllSiswaInfo($NISN);
                    ?>
                        <h2>Data Siswa</h2>
                        <form method="POST" action="AllProcess.php?action=EditSiswa">
                            <table class="table-gap" style="width:90%;">
                                <tr>
                                    <td class="td-info"><b>NISN</b></td>
                                    <td style="max-width:5px;"></td>
                                    <td style="width:80%"><input type="text" name="NISN" value="<?= $siswa['NISN']; ?>"></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>Nama</b></td>
                                    <td style="width:5px;"></td>
                                    <td><input type="text" name="nama" value="<?= $siswa['Nama']; ?>"></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>Kelas</b></td>
                                    <td style="width:5px;"></td>
                                    <td><input type="text" name="kelas" value="<?= $siswa['kelas']; ?>"></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>Tempat Lahir</b></td>
                                    <td style="width:5px;"></td>
                                    <td><input type="text" name="tempat_lahir" value="<?= $siswa['tempat_lahir']?>"></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>Tanggal Lahir</b></td>
                                    <td style="width:5px;"></td>
                                    <td><input type="date" name="tanggal_lahir" value="<?=$siswa['tanggal_lahir']; ?>"></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>Jumlah Saudara</b></td>
                                    <td style="width:5px;"></td>
                                    <td><input type="text" name="jlh_saudara" value="<?= $siswa['jlh_saudara']; ?>"></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>Anak Ke</b></td>
                                    <td style="width:5px;"></td>
                                    <td><input type="text" name="anak-ke" value="<?= $siswa['anak_ke']; ?>"></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>No KK</b></td>
                                    <td style="width:5px;"></td>
                                    <td><input type="text" name="no_KK_siswa" value="<?= $siswa['no_KK']; ?>"></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>Alamat</b></td>
                                    <td style="width:10px;"></td>
                                    <td><input type="text" name="alamat_siswa" value="<?= $siswa['alamat'] ?>"></td>
                                </tr>
                            </table>
                        <h2>Data Orangtua</h2>
                            <table class="table-gap" style="width:90%">
                                <tr>
                                    <td class="td-info"><b>No KK</b></td>
                                    <td style="width:10px;"></td>
                                    <td><input type="text" name="no_KK_ortu" value="<?= $siswa['no_KK'] ?>"></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>Alamat Keluarga</b></td>
                                    <td style="width:10px;"></td>
                                    <td><input type="text" name="alamat_ortu" value="<?= $siswa['alamat'] ?>"></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><h4>Ayah</h4></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info" style="width:22%;"><b>NIK</b></td>
                                    <td style="width:10px;"></td>
                                    <td  style="width:80%"><input type="text" name="NIK_ayah" value="<?= $siswa['NIK_ayah'] ?>"></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>Nama</b></td>
                                    <td style="width:10px;"></td>
                                    <td><input type="text" name="nama_ayah" value="<?= $siswa['nama_Ayah'] ?>"></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>Pekerjaan</b></td>
                                    <td style="width:10px;"></td>
                                    <td><input type="text" name="pekerjaan_ayah" value="<?= $siswa['pekerjaan_Ayah'] ?>"></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>Penghasilan</b></td>
                                    <td style="width:10px;"></td>
                                    <td><input type="text" name="penghasilan_ayah" value="<?= $siswa['penghasilan_Ayah'] ?>"></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>No Telepon</b></td>
                                    <td style="width:10px;"></td>
                                    <td><input type="text" name="no_telepon_ayah" value="<?= $siswa['no_telepon_Ayah'] ?>"></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><h4>Ibu</h4></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>NIK</b></td>
                                    <td style="width:10px;"></td>
                                    <td><input type="text" name="NIK_ibu" value="<?= $siswa['NIK_Ibu'] ?>"></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>Nama</b></td>
                                    <td style="width:10px;"></td>
                                    <td><input type="text" name="nama_ibu" value="<?= $siswa['nama_Ibu'] ?>"></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>Pekerjaan</b></td>
                                    <td style="width:10px;"></td>
                                    <td><input type="text" name="pekerjaan_ibu" value="<?= $siswa['pekerjaan_Ibu'] ?>"></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>Penghasilan</b></td>
                                    <td style="width:10px;"></td>
                                    <td><input type="text" name="penghasilan_ibu" value="<?= $siswa['penghasilan_Ibu'] ?>"></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>No Telepon</b></td>
                                    <td style="width:10px;"></td>
                                    <td><input type="text" name="no_telepon_ibu" value="<?= $siswa['no_telepon_Ibu'] ?>"></td>
                                </tr>
                            </table>
                            <button type="submit" class="btn btn-success box-shadow">Submit Data</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php require('commons/footer.php')?>
        </div>
    </body>
</html>