<?php
    require_once "commons/Function.php";
if($_GET['action'] == 'login'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = login($username,$password);
    if($login['username'] == $username && $login['PASSWORD'] == $password){
        
        $_SESSION['logged_in'] = TRUE;
        $_SESSION['username'] = $login['username'];
        $_SESSION['role'] = $login['role'];
        
        if($login['role'] == 1){
            echo "<script>alert('Selamat Datang Admin :)'); window.location = 'Dashboard.php'</script>";
        }
        else if($login['role'] == 2){
            $_SESSION['kode_guru'] = getKodeGuru($_SESSION['username']);
            header("location: Dashboard.php");
        }
        else{
            echo "MAAF AKUN ANDA BELUM SESUAI FORMAT";
        }
    }
    else{
        echo "<script>alert('Maaf Akun Anda Belum Terdaftar.'); window.location = 'login.php'</script>";
    }
}
else if($_GET['action'] == 'logout'){
    if(isset($_SESSION['logged_in'])){
        unset($_SESSION['logged_in']);
        unset($_SESSION['username']);
        unset($_SESSION['kelas']);
        unset($_SESSION['kode_guru']);
    }
    header('location: login.php');
}
else if($_GET['action'] == 'absensi'){
    global $db;
    $jumlahSiswa = countSiswa($_GET['kelas']);
    $AllSiswa = getKelas($_GET['kelas']);
    $id_absen = getIdAbsen($_SESSION['kode_guru'],$_GET['kelas']);
    $kelas = $_GET['kelas'];
    $angkatan = $_GET['angkatan'];
    $i = 1;
    foreach($AllSiswa as $Siswa){
        $status_absensi = $_POST['kehadiran'.$i];
        if($id_absen != NULL){
            $cek = cekAbsen($Siswa['NISN'],$id_absen);
            if($cek == 0){
                insertAbsen($Siswa['NISN'],$id_absen,$status_absensi);
            }
            else if($cek == 1){ 
                echo "<script>alert('Maaf Anda Sudah Melakukan Pengabsenan');window.location = 'DetailKelas.php?kelas=$kelas&angkatan=$angkatan'</script>";
            }
            ++$i;
        }
        else if($id_absen == NULL){
            echo "<script>alert('Absen Tidak Ditemukan. Absensi Hanya Dapat Dilakukan Sesuai Jadwal Yang Sudah Dibuat ');window.location = 'DetailKelas.php?kelas=$kelas&angkatan=$angkatan'</script>";
        }
    }
    if(mysqli_affected_rows($db) <= 0){
        echo "<script>alert('Absensi Gagal Dilakukan, Mohon Periksa Apakah Anda Melakukan Pengabsenan Pada Kelas yg Tepat dan Pada Waktu yang Tepat');window.location = 'DetailKelas.php?kelas=$kelas&angkatan=$angkatan'</script>";
    }
    else{
        echo "<script>alert('Absensi Berhasil Dilakukan.');window.location = 'AfterAbsensi.php?kelas=$kelas&angkatan=$angkatan'</script>";
    }
}
else if($_GET['action'] == 'UpdateAbsensi'){
    global $db;
    $jumlahSiswa = countSiswa($_GET['kelas']);
    $AllSiswa = getKelas($_GET['kelas']);
    $id_absen = getIdAbsen($_SESSION['kode_guru'],$_GET['kelas']);
    $kelas = $_GET['kelas'];
    $angkatan = $_GET['angkatan'];
    $i = 1;
    $temp = 0;
    foreach($AllSiswa as $Siswa){
        $status_absensi = $_POST['kehadiran'.$i];
        if($id_absen != NULL){
            $cek = cekAbsen($Siswa['NISN'],$id_absen);
            if($cek == 1){
                // echo "kehadiran pada process = ".$status_absensi."<br>";
                UpdateAbsensi($Siswa['NISN'],$id_absen,$status_absensi);
                // echo $Siswa['NISN']." ".$temp."<br>";
                if(mysqli_affected_rows($db) > 0){
                    $temp += 1;
                }
            }
            else if($cek == 0){ 
                echo "<script>alert('Maaf Anda Belum Melakukan Pengabsenan');window.location = 'DetailKelas.php?kelas=$kelas&angkatan=$angkatan'</script>";
            }
            ++$i;
        }
        else if($id_absen == NULL){
            echo "<script>alert('ID Absen Tidak Ditemukan. Absensi Hanya Dapat Dilakukan Sesuai Jadwal Yang Sudah Dibuat ');window.location = 'DetailKelas.php?kelas=$kelas&angkatan=$angkatan'</script>";
        }
    }
    if($temp <= 0){
        echo "<script>alert('Update Absensi Gagal Dilakukan');window.location = 'AfterAbsensi.php?kelas=$kelas&angkatan=$angkatan'</script>";
        // echo 'GAGAL';
    }
    else{
        echo "<script>alert('Update Absensi Berhasil Dilakukan.');window.location = 'AfterAbsensi.php?kelas=$kelas&angkatan=$angkatan'</script>";
        // echo "GOOD";
    }
}
else if($_GET['action'] == 'EditSiswa'){
    $DataBaruSiswa = array(
        "NISN" => $_POST['NISN'],
        "nama" => $_POST['nama'],
        "kelas" => $_POST['kelas'],
        "tempat_lahir" => $_POST['tempat_lahir'],
        "tanggal_lahir" => $_POST['tanggal_lahir'],
        "jlh-saudara" => $_POST['jlh_saudara'],
        "anak-ke" => $_POST['anak-ke'],
        "no_KK_siswa" => $_POST['no_KK_siswa'],
        "alamat_siswa" => $_POST['alamat_siswa'],

        "no_KK_ortu" => $_POST['no_KK_ortu'],
        "alamat_ortu" => $_POST['alamat_ortu'],

        "NIK_ayah" => $_POST['NIK_ayah'],
        "nama_ayah" => $_POST['nama_ayah'],
        "pekerjaan_ayah" => $_POST['pekerjaan_ayah'],
        "penghasilan_ayah" => $_POST['penghasilan_ayah'],
        "no_telepon_ayah" => $_POST['no_telepon_ayah'],
        
        "NIK_ibu" => $_POST['NIK_ibu'],
        "nama_ibu" => $_POST['nama_ibu'],
        "pekerjaan_ibu" => $_POST['pekerjaan_ibu'],
        "penghasilan_ibu" => $_POST['penghasilan_ibu'],
        "no_telepon_ibu" => $_POST['no_telepon_ibu'],
        );
        $NISN = $DataBaruSiswa['NISN'];
        // echo $DataBaruSiswa['NISN']." ". $DataBaruSiswa['nama'];
        $do = UpdateDataSiswa($DataBaruSiswa);
        if($do >= 1 ){
            echo "<script> alert('Data Berhasil Diubah'); window.location = 'DetailSiswa2.php?kode=$NISN' </script>";
        }
        else{
            echo "GAGAL !!!";
        }
    }
    else if($_GET['action'] == "HapusSiswa"){
        $NISN = $_GET['kode'];
        $do = DeleteSiswa($NISN);
        if($do > 0){
            echo "<script> alert('Data Berhasil Dihapus'); window.location = 'AllSiswa.php' </script>";
        }
        else{
            echo "GAGAL !!!";
        }
    }
    else if($_GET['action'] == 'TambahSiswa'){
        
        $NISN = $_POST['nisn'];
        $Nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jlh_saudara = $_POST['jumlah'];
        $anak_ke = $_POST['anak_ke'];
        $no_KK = $_POST['KK'];
        $alamat = $_POST['alamat'];
        
        $cek = cekSiswa($NISN);
        if($cek <= 0){
            $cek_kk = getKKSiswa_daftar($no_KK);
            if($cek_kk != NULL){
                $do = TambahSiswa($NISN, $Nama, $kelas, $tempat_lahir, $tanggal_lahir, $jlh_saudara, $anak_ke, $no_KK, $alamat);
                if($do >= 1){
                    echo "<script> alert('Siswa Berhasil Ditambahkan'); window.location = 'AllSiswa.php' </script>";
                }
                else{
                    echo "<script> alert('Siswa Gagal Ditambahkan !!!'); window.location = 'AllSiswa.php' </script>";
                }
            }
            else{
                echo "<script> alert('No KK Tidak Ada Dalam Sistem, Siswa Gagal Ditambahkan !!!'); window.location = 'AllSiswa.php' </script>";
            }
        }
        else{
            echo "<script> alert('Gagal Menambah Siswa. NISN Sudah Dipakai'); window.location = 'AllSiswa.php' </script>";
        }
        
    }
    else if($_GET['action'] == "EditGuru"){

        global $db;
        $DataBaru = array(
            "kode_lama" => $_GET['kode'],
            "kode_guru" => $_POST['kode_guru'],
            "nik" => $_POST['nik'],
            "nama" => $_POST['nama'],
            "username" => $_POST['username'],
            "bidang_pelajaran" => $_POST['bidang_pelajaran'],
            "alamat_guru" => $_POST['alamat_guru'],
            "tanggal_lahir" => $_POST['tanggal_lahir'],
            "tempat_lahir" => $_POST['tempat_lahir']
        );

        UpdateDataGuru($DataBaru);
        if(mysqli_affected_rows($db) <= 0){
            echo "<script> alert('Data Gagal Diubah'); window.location = 'AllGuru.php' </script>";
        }
        else{
            echo "<script> alert('Berhasil Mengubah Data Guru'); window.location = 'AllGuru.php' </script>";
        }        
    }
    else if($_GET['action'] == "HapusGuru"){
        global $db;
        $kode_guru = $_GET['kode'];

        HapusGuru($kode_guru);

        if(mysqli_affected_rows($db) <= 0){
            echo "<script> alert('Guru Gagal Dihapus'); window.location = 'AllGuru.php' </script>";
        }
        else{
            echo "<script> alert('Berhasil Menghapus Guru'); window.location = 'AllGuru.php' </script>";
        }
    }
    else if($_GET['action'] == "TambahGuru"){
        global $db;

        $DataBaru = array(
            "kode_guru" => $_POST['kode_guru'],
            "nik" => $_POST['nik'],
            "nama" => $_POST['nama'],
            "username" => $_POST['username'],
            "bidang_pelajaran" => $_POST['bidang_pelajaran'],
            "alamat_guru" => $_POST['alamat_guru'],
            "tanggal_lahir" => $_POST['tanggal_lahir'],
            "tempat_lahir" => $_POST['tempat_lahir']
        );

        TambahGuru($DataBaru);

        if(mysqli_affected_rows($db) >= 1 ){
            echo "<script> alert('Guru Berhasil Ditambahkan'); window.location = 'AllGuru.php' </script>";
        }
        else{
            echo "<script> alert('Guru Gagal Ditambahkan'); window.location = 'AllGuru.php' </script>";
        }
    }


?>