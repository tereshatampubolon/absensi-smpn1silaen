<html>
    <head>
        <title>Tambah Guru</title>
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
                            <li><a href="AllGuru.php" style="text-decoration: none;color:white;">Semua Guru</a></li>
                            <li><a href="#" style="text-decoration: none;color:white;">Tambah Guru</a></li>
                        </ul>
                         <!-- CONTENTS START HERE -->
                         <a href="AllGuru.php"><div class="btn btn-success" style="margin-bottom:15px;">
                            <span class="glyphicon glyphicon-arrow-left">&nbsp</span>Kembali</div>
                        </a>
                    <div class="row" style="margin-left:5%;margin-top:-30px;">
                        <h2>Data Guru</h2>
                        <form method="POST" action="AllProcess.php?action=TambahGuru">
                            <table class="table-gap" style="width:90%;">
                                <tr>
                                    <td class="td-info"><b>Nama</b></td>
                                    <td style="max-width:5px;"></td>
                                    <td style="width:80%"><input type="text" name="nama" ></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>Kode Guru</b></td>
                                    <td style="max-width:5px;"></td>
                                    <td style="width:80%"><input type="text" name="kode_guru" ></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>NIK</b></td>
                                    <td style="width:5px;"></td>
                                    <td><input type="text" name="nik" ></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>Username Akun</b></td>
                                    <td style="width:5px;"></td>
                                    <td><input type="text" name="username" ></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>Bidang Pelajaran</b></td>
                                    <td style="width:5px;"></td>
                                    <td><input type="text" name="bidang_pelajaran" ></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>Alamat</b></td>
                                    <td style="width:10px;"></td>
                                    <td><input type="text" name="alamat_guru" ></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>Tanggal Lahir</b></td>
                                    <td style="width:5px;"></td>
                                    <td><input type="date" name="tanggal_lahir" ></td>
                                </tr>
                                <tr>
                                    <td style="height:8px;"></td>
                                </tr>
                                <tr>
                                    <td class="td-info"><b>Tempat Lahir</b></td>
                                    <td style="width:5px;"></td>
                                    <td><input type="text" name="tempat_lahir" ></td>
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