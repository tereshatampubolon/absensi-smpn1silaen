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
           h2{
                color:black;
           }
           td{
                color:black;
                padding-left:10px;
           }
           .td-header{
                background-color: grey;
                padding-right:10px;
           }
           .td-info{
                background-color: gainsboro;
           }
           .color1{
               background-color: #ccf5ff;
           }
           .color2{
               background-color: #b3f0ff;
           }
           .td-left{
                width:20%;
           }
           .td-empty{
               width:3px;
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
                            <li><a href="#" style="text-decoration: none;color:white;">Detail User</a></li>
                        </ul>
                         <!-- CONTENTS START HERE -->
                    <div class="row" style="margin-left:5%;margin-top:-30px;">
                    <?php
                        $username = $_SESSION['username'];
                        $user = getAccountInfo($username);
                    ?>
                        <h2>Data Diri</h2>
                        <table style="width:90%;">
                            <tr>
                                <td class="color1 td-left">NIK</td>
                                <td class="td-empty">&nbsp</td>
                                <td class="color1"><?= $user['NIK']; ?></td>  
                            </tr>
                            <tr>
                                <td class="color2 td-left">Nama</td>
                                <td class="td-empty">&nbsp</td>
                                <td class="color2"><?= $user['Nama']; ?></td>
                            </tr>
                            <tr>
                                <td class="color1 td-left">Tempat/Tanggal Lahir</td>
                                <td class="td-empty">&nbsp</td>
                                <td class="color1"><?= $user['tempat_lahir'].",".$user['tanggal_lahir']; ?></td>
                            </tr>
                            <tr>
                                <td class="color2 td-left">Username Akun</td>
                                <td class="td-empty">&nbsp</td>
                                <td class="color2"><?= $user['username_akun']; ?></td>
                            </tr>
                        </table>
                    </div>
                    </div>
            </div>
            <?php require('commons/footer.php')?>
        </div>
    </body>
</html>