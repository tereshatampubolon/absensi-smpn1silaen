<html>
    <head>
        <title>Detail Guru</title>
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
                            <li><a href="Dashboard.php" style="text-decoration: none;color:white;">Detail Guru</a></li>
                            <li><a href="#" style="text-decoration: none;color:white;">Detail Guru</a></li>
                        </ul>
                         <!-- CONTENTS START HERE -->
                    <div class="row" style="margin-left:5%;margin-top:-30px;">
                    <?php 
                        $kode_guru = $_GET['kode'];
                        $guru = getGuru($kode_guru);
                    ?>
                        <h2>Data Guru</h2>
                            <table class="table-gap" style="width:90%;">
                                <tr>
                                    <td class="color1" style="width:22%"><b>Kode Guru</b></td>
                                    <td style="max-width:5px;"></td>
                                    <td class="color1" style="width:80%"><?= $guru['kode_guru']; ?></td>
                                </tr>
                                <tr>
                                    <td class="color2"><b>NIK</b></td>
                                    <td style="width:5px;"></td>
                                    <td class="color2"><?= $guru['NIK']; ?></td>
                                </tr>
                                <tr>
                                    <td class="color1"><b>Nama</b></td>
                                    <td style="width:5px;"></td>
                                    <td class="color1"><?= $guru['Nama']; ?></td>
                                </tr>
                                <tr>
                                    <td class="color1"><b>Username Akun</b></td>
                                    <td style="width:5px;"></td>
                                    <td class="color1"><?= $guru['username_akun']; ?></td>
                                </tr>
                                <tr>
                                    <td class="color2"><b>Tempat,Tanggal Lahir</b></td>
                                    <td style="width:5px;"></td>
                                    <td class="color2"><?= $guru['tempat_lahir'].",".$guru['tanggal_lahir']; ?></td>
                                </tr>
                                <tr>
                                    <td class="color2"><b>Bidang Pelajaran</b></td>
                                    <td style="width:5px;"></td>
                                    <td class="color2"><?= $guru['Bidang_Pelajaran']; ?></td>
                                </tr>
                                <tr>
                                    <td class="color2"><b>Alamat</b></td>
                                    <td style="width:10px;"></td>
                                    <td class="color2"><?= $guru['alamat'] ?></td>
                                </tr>
                        </table>
                    </div>
                </div>
            <?php require('commons/footer.php')?>
        </div>
    </body>
</html>