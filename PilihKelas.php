<html>
    <head>
        <?php
            require_once "commons/Function.php";

            if (!isset($_SESSION['logged_in'])){
                header("location: login.php");
            }

            $angkatan = PilihAngkatan($_GET['angkatan']);
            // $kelas = $_GET['kelas'];
            $angkatan_kelas = $_GET['angkatan'];
        ?>
        <title>Pilih Kelas</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/myStyle.css">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <style>
            a{
                color:white;
            }
            a:hover{
                color:whitesmoke;
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
                        <li><a href="Dashboard.php">Dashboard</a></li>
                        <li><a href="#">Pembagian Kelas</a></li>
                    </ul>
                    <a href="Dashboard.php"><div class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp Kembali</div></a>
                    <div class="row" style="margin:20px 10px 20px 10%">
                    <?php foreach($angkatan as $data){ ?>
                        <center>
                            <?php
                            $kelas = $data['nama_kelas'];
                                if($_SESSION['role'] == 2){
                                    echo "<a href='DetailKelas.php?kelas=$kelas&angkatan=$angkatan_kelas'>";
                                        echo "<div class='col-md-4 kelas box-shadow bergetar' style='background-color:#1b8cff'>$kelas</div>";
                                    echo "</a>";
                                }
                                else{      
                                    echo "<a href='DetailKelas_admin.php?kelas=$kelas&angkatan=$angkatan_kelas'>";
                                        echo "<div class='col-md-4 kelas box-shadow bergetar' style='background-color:#1b8cff'>$kelas</div>";
                                    echo "</a>";
                                }
                            ?>
                        </center>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <?php require('commons/footer.php')?>
        </div>
    </body>
</html>