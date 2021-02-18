<html>
    <head>
        <?php
            require_once "commons/Function.php";

            if (!isset($_SESSION['logged_in'])){
                header("location: login.php");
            }

            $AllSiswa = getAllSiswa();
        ?>
        <title>Pilih Kelas</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/myStyle.css">
        <script src="js/jquery-1.12.4.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $('.search-box input[type="text"]').on("keyup input", function(){
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if(inputVal.length){
                    $.get("backend-search.php", {term: inputVal}).done(function(data){
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else{
                    resultDropdown.empty();
                }
            });
            
            // Set search input value on click of result item
            $(document).on("click", ".result p", function(){
                $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                $(this).parent(".result").empty();
            });
        });
        </script>
        <style>
            a{
                color:black;
                text-decoration: none;
            }
            a:hover{
                color:teal;
                text-decoration: none;
            }
            th{
                font-size:18px;
                text-align:center;
            }
            .table_header{
                font-size:18px;
                color:black;
                text-align:center;
                text-decoration: bold;
                padding-left:5px;
                max-width:210px;
            }
            .data{
                text-align:center;
                color:black;
                width: 10%;
                font-size:14px;
            }
            input[type=radio]{
                font-size:30px;
            }
            td,th{
                color:black;
                height:40px;
           }
           td{
               font-size:13px;
           }
           .tr-header{
                border-bottom:2px solid black;
                height:40px;
                background: linear-gradient(to top right,#00a8ff,#c3ebff);
                border-radius: 10px;
           }
           .td-center{
              text-align:center;
           }
           .w90{
               width:90%;
           }
           /* Formatting search box */
            .search-box{
                width: 300px;
                position: relative;
                display: inline-block;
                font-size: 14px;
                margin-bottom: 15px;
                color:black;
            }
            .search-box input[type="text"]{
                height: 32px;
                padding: 5px 10px;
                border: 1px solid #CCCCCC;
                font-size: 14px;
            }
            .result{
                position: absolute;        
                z-index: 999;
                top: 100%;
                left: 0;
            }
            .search-box input[type="text"], .result{
                width: 100%;
                box-sizing: border-box;
            }
            /* Formatting result items */
            .result p{
                margin: 0;
                padding: 7px 10px;
                border: 1px solid #CCCCCC;
                border-top: none;
                cursor: pointer;
                background: white;
            }
            .result p:hover{
                background: #f2f2f2;
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
                        <li><a href="#" style="text-decoration: none;color:white;">Semua Siswa</a></li>
                    </ul>
                    <!-- Constent Start Here -->
                    <a href="add_siswa.php"><div class="btn btn-success" style="height:32px;margin-top:-4px"><span class="glyphicon glyphicon-plus">&nbsp</span>Tambah Siswa</div></a>
                    <div class="search-box">
                        <input type="text" autocomplete="off" placeholder="Cari Siswa..." />
                        <div class="result"></div>
                    </div>
                    <table style="width:100%">
                        <tr class="tr-header">
                            <td class='data table_header' style="width:3%;font-size:18px;"><b>No</b></td>
                            <td class="table_header">NISN</td>
                            <td class="table_header" style="text-align:left">Nama</td>
                            <td class="table_header" style="text-align:left">Kelas</td>
                            <td class="table_header" style="text-align:left">Tempat,Tanggal Lahir</td>
                            <td class="table_header" style="text-align:left" colspan="4">Alamat</td>
                        </tr>
                        <?php 
                            $i = 1;
                            foreach($AllSiswa  as $siswa){
                                if($i%2 == 0)
                                {
                                    $color = '#ccf5ff';
                                }
                                else{
                                    $color = '#b3f0ff';
                                }
                        ?>
                        <tr style="background-color:<?= $color; ?>">
                           <td class="data" style="width:3%"><?= $i; ?></td>
                           <td class="data"><?= $siswa['NISN']; ?></td>
                           <td><?= $siswa['Nama']; ?></td>
                           <td><?= $siswa['kelas']; ?></td>
                           <td><?= $siswa['tempat_lahir'].','.$siswa['tanggal_lahir'];; ?></td>
                           <td><?= $siswa['alamat']; ?></td>
                           <td><a href="DetailSiswa2.php?kode=<?= $siswa['NISN']; ?>">
                                <div class="btn btn-success w90 box-shadow">Profile</div></a></td>
                           <td><a href="EditSiswa.php?kode=<?= $siswa['NISN']; ?>">
                                <div class="btn btn-warning w90 box-shadow">Edit</div></a></td>
                           <td><a href="AllProcess.php?action=HapusSiswa&kode=<?= $siswa['NISN']; ?>">
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