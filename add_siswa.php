<html>
    <head>
        <title>Tambah Siswa</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/myStyle.css">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>

       <style>
           .angkatan
                {
                    height: 150px;
                    width: 240px;
                    margin: 10px ;
                    font-family:'Times New Roman', Times, serif;
                    font-size: 50px;
                    padding:45px 40px 40px 40px;
                    border-radius: 15px;
                }
       </style>   
    </head>
    <body style="color:white">
        <div class="container">
            <?php require('commons/header.php')?>
            <div class="col-md-12 content box-shadow" style="margin:5px 0px 5px 0px;padding:0px">
                <?php require('commons/menu.php')?>
                <div class="col-md-10">
                        <ul class="breadcrumb box-shadow">
                            <li><a href="add_siswa.php" style="text-decoration: none;color:white;">Tambah Siswa</a></li>
                        </ul>
                        <!-- Content Start Here -->
                        <a href="AllSiswa.php"><div class="btn btn-success" style="margin-bottom:5px;">
                            <span class="glyphicon glyphicon-arrow-left">&nbsp</span>Kembali</div>
                        </a>
                    <div class="row" style="margin-left:5%;margin-right:5%;">
						<form action="AllProcess.php?action=TambahSiswa" method="post">
            <h2 style="color:black;">Data Siswa</h2>
            <table style="width:90%">
              <tr>
                <td style="width:20%;color:black"><b>NISN </b></td>
                <td>
                <div class="form-group">
                <input style="width:70%;" type="text" class="form-control" id="nisn" name="nisn" placeholder="NISN" required>
                </div>
                </td>
              </tr>
              <tr>
                <td style="width:20%;color:black"><b>Nama </b></td>
                <td>
                <div class="form-group">
                <input type="text" style="width:70%;" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                </div>
                </td>
              </tr>
              <tr>
                <td style="width:20%;color:black"><b>Kelas</b></td>
                <td>
                <div class="form-group">
                <input type="text" style="width:70%;" class="input-tanggal form-control" id="kelas" name="kelas" placeholder="Kelas" required>
                </div> 
                </td>
              </tr>
              <tr>
                <td style="width:20%;color:black"><b>Tempat Lahir</b></td>
                <td>
                <div class="form-group">
                <input type="text" style="width:70%;" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" required>
                </div>
                </td>
              </tr>
              <tr>
                <td style="width:20%;color:black"><b>Tanggal Lahir</b></td>
                <td>
                <div class="form-group">
                <input type="date" style="width:70%;" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" required>
                </div>
                </td>
              </tr>
              <tr>
                <td style="width:20%;color:black"><b>Jumlah Saudara</b></td>
                <td>						  
                <div class="form-group" style="color:black;">
                <input type="text" style="width:70%;" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Saudara" required>
                </div>
                </td>
              </tr>
              <tr>
              <td style="width:20%;color:black"><b>Anak ke-</b></td>
                <td>
                <div class="form-group">
                <input type="text" style="width:70%;" class="form-control" id="anak_ke" name="anak_ke" placeholder="Anak ke" required>
                </div>
                </td>
              </tr>
              <tr>
              <td style="width:20%;color:black"><b>No KK</b></td>
                <td>
                <div class="form-group">
                <input type="text" style="width:70%;" class="form-control" id="KK" name="KK" placeholder="NO KK" required>
                </div>
                </td>
              </tr>
              <tr>
              <td style="width:20%;color:black"><b>Alamat</b></td>
                <td>
                <div class="form-group">
                <input type="text" style="width:70%;" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
                </div>
                </td>
              </tr>
              </table>
						<button type="submit" class="btn btn-primary">Daftar</button>
					</form>
                        </div>
                    
                        <!-- Content Ends Here -->
                    </div>
            </div>
            <?php require('commons/footer.php')?>
        </div>
    </body>
</html>