<html>
    <head>
        <?php
        require_once "commons/Function.php";
        
        if (!isset($_SESSION['logged_in'])){
            header("location: login.php");
        }

        ?>
        <title>Pilih Kelas</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/myStyle.css">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
       <style>
           td,th{
                color:black;
                width:10%;
                height:40px;
           }
           .td-center{
              text-align:center;
           }
           .w90{
               width:90%;
           }
       </style>   
    </head>
    <body style="color:white">
        <div class="container">
            <?php require('commons/header.php')?>
            <div class="col-md-12 content box-shadow" style="margin:5px 0px 5px 0px;padding:0px">
                <?php require('commons/menu.php')?>
                <div class="col-md-10" style="margin-top:30px;">
                        <ul class="breadcrumb box-shadow">
                            <li><a href="Dashboard.php" style="text-decoration: none;color:white;">Dashboard</a></li>
                        </ul>
                        <!-- Content Start Here -->
                    <div class="row" style="margin-left:5%;">
                        <form>
                            <table>
                                <tr>
                                    <th style="width:5%">No</th>  
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                </tr>
                                <?php
                                    $i  = 1;
                                    $AllAccount = getAllAccount();
                                    foreach($AllAccount as $Account){ ?>
                                <tr>
                                    <center>
                                    <td style="width:5%"><?= $i; ?></td>
                                    </center>
                                    <td><?= $Account['username']; ?></td>
                                    <td><?= $Account['PASSWORD']; ?></td>
                                    <td><?= $Account['role']; ?></td>
                                    <td><a href="DetailUser.php?kode=<?= $Account['username']; ?>"><div class="btn btn-info w90 box-shadow">Profile</div></a></td>
                                    <td><a href="AllProcess.php?action=account&kelola=edit&kode=<?= $Account['username']; ?>"><div class="btn btn-warning w90 box-shadow">Edit</div></a></td>
                                    <td><a href="AllProcess.php?action=account&kelola=hapus&kode=<?= $Account['username']; ?>"><div class="btn btn-danger w90 box-shadow">Hapus</div></a></td>
                                </tr>
                                <?php 
                                    ++$i;                           
                                    } 
                                ?>
                            </table>
                        </form>
                    </div>
                    
                </div>
            </div>
            <?php require('commons/footer.php')?>
        </div>
    </body>
</html>