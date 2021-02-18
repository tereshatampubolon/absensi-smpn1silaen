<html>
    <head>
        <?php
            require_once "commons/Function.php";

            if (!isset($_SESSION['logged_in'])){
                header("location: login.php");
            }
            $AllGuru = getAllGuru();
        ?>
        <title>Semua Guru</title>
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
                        <li><a href="Dahsboard.php" style="text-decoration: none;color:white;">Dashboard</a></li>
                        <li><a href="#" style="text-decoration: none;color:white;">Semua Guru</a></li>
                    </ul>
                    <a href="add_guru.php">
                        <div class="btn btn-success" style="height:32px;margin-top:-4px">
                        <span class="glyphicon glyphicon-plus">&nbsp</span>Tambah Guru</div>
                    </a>
                    <table style="width:100%">
                        <tr style="border-bottom:2px solid black;height:40px;">
                            <td class='data table_header' style="width:5%;font-size:18px;"><b>No</b></td>
                            <td class="table_header" style='width:20%'><b>Kode Guru</b></td>
                            <td class="table_header" style="text-align:left"><b>NIK</b></td>
                            <td class="table_header" style="text-align:left;width:60%"><b>Nama</b></td>
                            <td class="table_header" ><b>Username</b></td>
                            <!-- <td class="table_header" style="text-align:left;width:200px;"><b>Tempat,Tanggal Lahir</b></td>
                            <td class="table_header" style="text-align:left"><b>Alamat</b></td> -->
                        </tr>
                        <?php 
                            $i = 1;
                            foreach($AllGuru  as $guru){ ?>
                        <tr>
                           <td class="data" style="width:5%"><div class="thumbnail margin-td"><?= $i; ?></div></td>
                           <td class="data"><div class="thumbnail margin-td" ><?= $guru['kode_guru']; ?></div></td>
                           <td><div class="thumbnail margin-td"><?= $guru['NIK']; ?></div></td>
                           <td><div class="thumbnail margin-td" ><?= $guru['Nama']; ?></div></td>
                           <td><div class="thumbnail margin-td"><?= $guru['username_akun']; ?></div></td>
                           <td><a href="DetailGuru.php?kode=<?= $guru['kode_guru']; ?>">
                                <div class="btn btn-success w90 box-shadow">Profile</div></a></td>
                           <td><a href="EditGuru.php?kode=<?= $guru['kode_guru']; ?>">
                                <div class="btn btn-warning w90 box-shadow">Edit</div></a></td>
                           <td><a href="AllProcess.php?action=HapusGuru&kode=<?= $guru['kode_guru']; ?>">
                                <button class="btn btn-danger w90 box-shadow" onclick="return confirm('Apakah Anda Ingin Menghapus Siswa Ini?')">Hapus</button>
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