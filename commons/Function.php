<?php
session_start();

if(!isset($_SESSION['logged_in'])){
    header("location: login.php");
}
    global $db;
    $db = mysqli_connect('localhost','root','','smpn_1_silaen');
    if(!$db){
        die("Database Connect Problem");
    }
    function ExecuteQuery($query){
        global $db;
        $result = mysqli_query($db,$query);

        return $result;
    }
    function getGuru($kode_guru){
        $query = "SELECT * FROM guru WHERE kode_guru = '$kode_guru'";
        $result = ExecuteQuery($query);
        $guru = mysqli_fetch_assoc($result);
        return $guru;
    }
    function UpdateDataGuru($DataBaru){
        
        global $db;
        $kode_lama = $DataBaru['kode_lama'];
        $kode_guru = $DataBaru['kode_guru'];
        $NIK = $DataBaru['nik'];
        $nama =  $DataBaru['nama'];
        $username = $DataBaru['username'];
        $bidang_pelajaran = $DataBaru['bidang_pelajaran'];
        $alamat = $DataBaru['alamat_guru'];
        $tanggal_lahir = $DataBaru['tanggal_lahir'];
        $tempat_lahir = $DataBaru['tempat_lahir'];

        $query = "UPDATE guru SET kode_guru = '$kode_guru',NIK = '$NIK',username_akun = '$username',
                  Nama = '$nama',Bidang_Pelajaran ='$bidang_pelajaran',tanggal_lahir = '$tanggal_lahir',
                  tempat_lahir = '$tempat_lahir',alamat = '$alamat' WHERE kode_guru = '$kode_lama'";

        $result = ExecuteQuery($query);
    }
    function HapusGuru($kode_guru){
        $query = "DELETE FROM guru WHERE kode_guru = '$kode_guru'";
        $result = ExecuteQuery($query);
    }
    function TambahGuru($DataBaru){
        $kode_guru = $DataBaru['kode_guru'];
        $NIK = $DataBaru['nik'];
        $nama =  $DataBaru['nama'];
        $username = $DataBaru['username'];
        $bidang_pelajaran = $DataBaru['bidang_pelajaran'];
        $alamat = $DataBaru['alamat_guru'];
        $tanggal_lahir = $DataBaru['tanggal_lahir'];
        $tempat_lahir = $DataBaru['tempat_lahir'];

        $query = "INSERT INTO guru VALUES('$kode_guru','$NIK','$username','$nama','$bidang_pelajaran','$tanggal_lahir','$tempat_lahir','$alamat')";

        $result = ExecuteQuery($query);
    }
    function getAllGuru(){
        $query = "SELECT * FROM guru";
        $result = ExecuteQuery($query);

        $allGuru = [];
        while($data = mysqli_fetch_assoc($result)){
            $allGuru[] = $data; 
        }
        return $allGuru;
    }
    function getKodeGuru($username){
        $query = "SELECT kode_guru FROM guru WHERE Username_akun = '$username'";

        $result = ExecuteQuery($query);

        $data = mysqli_fetch_assoc($result);

        return $data['kode_guru'];
    }
    function getUser($username){
        $query = "SELECT * FROM akun WHERE username = '$username'";

        $result = ExecuteQuery($query);

        $data = mysqli_fetch_assoc($result);

        return $data;
    }
    function login($username,$password){
        $user = getUser($username);

        return $user;
    }
    function getAccountInfo($username){
        $user = getUser($username);
        $table = "";

        if($user['role'] == '1'){
            $table = 'staf_tata_usaha';
        }
        else if($user['role'] == '2'){
            $table = 'guru';
        }
        $query = "SELECT * FROM $table WHERE username_akun = '$username'";
        $result = ExecuteQuery($query);

        $data = mysqli_fetch_assoc($result);
        return $data;
    }
    function getKelas($kelas){
        $query = "SELECT * FROM siswa WHERE kelas = '$kelas' ORDER BY NISN";

        $result = ExecuteQuery($query);

        $Allsiswa = [];
        while($data = mysqli_fetch_assoc($result)){
            $Allsiswa[] = $data;
        }
        return $Allsiswa;
    }
    function getAllSiswa(){
        $query = "SELECT * FROM siswa ORDER BY kelas,nama";
        $result = ExecuteQuery($query);
        $AllSiswa = [];
        
        while($data = mysqli_fetch_assoc($result)){
            $AllSiswa[] = $data;
        }
        return $AllSiswa;
    }
    function countSiswa($kelas){
        $query = "SELECT * FROM siswa WHERE kelas = '$kelas'";
        $result = ExecuteQuery($query);

        $jumlahSiswa = mysqli_num_rows($result);
        return $jumlahSiswa;
    }
    // function insertAbsen($status_absensi,)
    function getAllAccount(){
        $query = "SELECT * FROM akun";
        $result = ExecuteQuery($query);

        $AllAccount = [];
        while($data = mysqli_fetch_assoc($result)){
            $AllAccount[] = $data;
        }
        return $AllAccount;
    }
    function getKKSiswa($NISN){
        $query = "SELECT no_KK from siswa where NISN = '$NISN'";
        $result = ExecuteQuery($query);
        $data = mysqli_fetch_array($result);
        return $data['no_KK'];
    }
    function getKKSiswa_daftar($no_KK){
        $query = "SELECT * from orangtua where no_KK = '$no_KK'";
        $result = ExecuteQuery($query);
        $data = mysqli_fetch_array($result);
        return $data['no_KK'];
    }
    function getAllSiswaInfo($NISN){
        $no_KK = getKKSiswa($NISN);
        $query = "SELECT * FROM siswa INNER JOIN orangtua ON siswa.no_KK = orangtua.no_KK WHERE siswa.no_KK = '$no_KK'";
        $result = ExecuteQuery($query);
        // echo 'result = '.$result;
        while($data = mysqli_fetch_assoc($result)){
            if($data['NISN'] == $NISN){
                break;
            }
        }
        return $data;
        
    }
    function getIdJadwal($kode_guru,$kelas){
        $query = "SELECT id_jadwal FROM Jadwal WHERE NOW() BETWEEN jam_mulai AND jam_berakhir AND kode_guru = '$kode_guru' AND kelas = '$kelas'";
        $result = ExecuteQuery($query);
        $data = mysqli_fetch_assoc($result);
        return $data['id_jadwal'];
    }
    function getInfoAfterAbsensi($kode_guru,$kelas){
            $id_jadwal = getIdJadwal($kode_guru,$kelas);
            $id_absensi = getIdAbsen($kode_guru,$kelas);
        $query = "SELECT Nama,siswa.NISN,kehadiran,id_jadwal,id_absensi FROM siswa 
                  INNER JOIN status_absensi_siswa INNER JOIN jadwal 
                  ON siswa.NISN = status_absensi_siswa.NISN WHERE id_absensi = 
                  '$id_absensi' AND tanggal = CURDATE() AND id_jadwal = '$id_jadwal'";
        $result = ExecuteQuery($query);

        $AllSiswaInfo = [];
        while($data = mysqli_fetch_assoc($result)){
            $AllSiswaInfo[] = $data;
        }
        return $AllSiswaInfo;
    }
    function getLaporan($kelas){
        // $id_absen = getIdAbsen($kode_guru,$kelas);
        $query = "SELECT absensi.id_absensi,tanggal,kode_guru,id_jadwal,kelas 
                  FROM status_absensi_siswa  INNER JOIN absensi 
                  ON absensi.id_absensi = status_absensi_siswa.id_absensi WHERE kelas = '$kelas' 
                  GROUP BY absensi.id_absensi,tanggal";
        $result = ExecuteQuery($query);

        $AllInfo = [];
        while($data = mysqli_fetch_assoc($result)){
            $AllInfo[] = $data;
        }
        return $AllInfo;
    }
    function getIdAbsen($kode_guru,$kelas){
        // nilai default kode_guru sementara
        // $kode_guru = "HHS";
        $id_jadwal = getIdJadwal($kode_guru,$kelas);
        $query = "SELECT id_absensi FROM absensi WHERE kode_guru = '$kode_guru' AND id_jadwal = '$id_jadwal'";
        // echo "kode guru = ".$kode_guru." id jadwal = ".$id_jadwal."<br>";
        $result = ExecuteQuery($query);
        $data = mysqli_fetch_assoc($result);
        if($data['id_absensi'] == NULL){
            
           return NULL;
        }
        else{
            return $data['id_absensi'];
        }
    }
    function insertAbsen($NISN,$id_absen,$kehadiran){
        $query = "INSERT INTO status_absensi_siswa VALUES('$kehadiran','$id_absen','$NISN',CURDATE())";
        $result = ExecuteQuery($query);
        return $result;
    }
    function UpdateAbsensi($NISN,$id_absen,$kehadiran){
        // echo "kehadiran = ". $kehadiran."<br>";
        $query = "UPDATE status_absensi_siswa SET kehadiran = '$kehadiran',id_absensi = '$id_absen',NISN = '$NISN',tanggal = CURDATE() 
                 WHERE NISN = '$NISN' AND tanggal = CURDATE()";
        $result = ExecuteQuery($query);
        return $result;
    }
    function cekAbsen($NISN,$id_absen){
        $query = "SELECT * FROM status_absensi_siswa WHERE NISN = '$NISN' AND id_absensi = '$id_absen' AND tanggal = CURDATE()";
        $result = ExecuteQuery($query);
        if(mysqli_num_rows($result) > 0){
            return 1;
        }
        else {
            return 0;
        }
    }
    function UpdateDataSiswa($DataBaru){
        global $db;
        $NISN = $DataBaru['NISN'];
        $nama = $DataBaru['nama'];
        $kelas = $DataBaru['kelas'];
        $tempat_lahir = $DataBaru['tempat_lahir'];
        $tanggal_lahir = $DataBaru['tanggal_lahir'];
        $jlh_saudara = $DataBaru['jlh-saudara'];
        $anak_ke = $DataBaru['anak-ke'];
        $no_kk_siswa = $DataBaru['no_KK_siswa'];
        $alamat_siswa = $DataBaru['alamat_siswa'];

        $no_kk_ortu = $DataBaru['no_KK_ortu'];
        $alamat_ortu = $DataBaru['alamat_ortu'];

        $NIK_ayah = $DataBaru['NIK_ayah'];
        $nama_ayah = $DataBaru['nama_ayah'];
        $pekerjaan_ayah = $DataBaru['pekerjaan_ayah'];
        $penghasilan_ayah = $DataBaru['penghasilan_ayah'];
        $no_telepon_ayah = $DataBaru['no_telepon_ayah'];

        $NIK_ibu = $DataBaru['NIK_ibu'];
        $nama_ibu = $DataBaru['nama_ibu'];
        $pekerjaan_ibu = $DataBaru['pekerjaan_ibu'];
        $penghasilan_ibu = $DataBaru['penghasilan_ibu'];
        $no_telepon_ibu = $DataBaru['no_telepon_ibu'];

        $querySiswa = "UPDATE siswa SET NISN = '$NISN',Nama = '$nama', Kelas = '$kelas',
                       tempat_lahir = '$tempat_lahir',tanggal_lahir = '$tanggal_lahir',
                       jlh_saudara = '$jlh_saudara',anak_ke ='$anak_ke',no_KK = '$no_kk_siswa',
                       alamat = '$alamat_siswa' WHERE NISN = '$NISN'";
        $result = ExecuteQuery($querySiswa);
        $cek = 0;
        if(mysqli_affected_rows($db) > 0){
            $cek += 1;
        }
        $queryOrtu = "UPDATE orangtua SET no_KK = '$no_kk_ortu',NIK_ayah = '$NIK_ayah',nama_Ayah = '$nama_ayah', pekerjaan_Ayah = '$pekerjaan_ayah',
                      penghasilan_ayah = '$penghasilan_ayah',no_telepon_Ayah = '$no_telepon_ayah',
                      NIK_ibu = '$NIK_ibu',nama_ibu = '$nama_ibu', pekerjaan_ibu = '$pekerjaan_ibu',
                      penghasilan_ibu = '$penghasilan_ibu',no_telepon_ibu = '$no_telepon_ibu',
                      alamat = '$alamat_ortu' WHERE no_KK = '$no_kk_ortu'";
        $result = ExecuteQuery($queryOrtu);
        if(mysqli_affected_rows($db) > 0){
            $cek += 1;
        }
        return $cek;
    }
    function TambahSiswa($NISN, $Nama, $kelas, $tempat_lahir, $tanggal_lahir, $jlh_saudara, $anak_ke, $no_KK, $alamat){
        global $db;
        $query = "INSERT INTO siswa VALUES('$NISN', '$Nama', '$kelas', '$tempat_lahir', '$tanggal_lahir', '$jlh_saudara', '$anak_ke', '$no_KK', '$alamat')";
        $result = ExecuteQuery($query);
        if(mysqli_affected_rows($db) > 0){
            return 1;
        }
        else{
            echo mysqli_error($db);
            return 0;
        }
    }
    function cekSiswa($NISN){
        $query = "SELECT * FROM siswa WHERE NISN = '$NISN'";
        $result = ExecuteQuery($query);
        $cek_data = mysqli_num_rows($result);
        return $cek_data;
    }
    function DeleteSiswa($NISN){
        global $db;
        $query = "DELETE FROM siswa WHERE NISN = '$NISN'";
        $result = ExecuteQuery($query);
        return mysqli_affected_rows($db);
    }
    function PilihAngkatan($angkatan){
        $query = "SELECT nama_kelas FROM kelas WHERE nama_kelas LIKE '$angkatan%'";
        $result = ExecuteQuery($query);
        $angkatan = [];
        while($data = mysqli_fetch_assoc($result)){
            $angkatan[] = $data;
        }
        return $angkatan;
    }
    function GetJumlahSiswa($kelas){
        $query = "SELECT jumlah_siswa FROM kelas WHERE nama_kelas = '$kelas'";
        $result = ExecuteQuery($query);
        $data = mysqli_fetch_assoc($result);
        return $data['jumlah_siswa'];
    }
    function CountKehadiran_byGuru($kehadiran,$kode_guru,$kelas){
        $id_absen = getIdAbsen($kode_guru,$kelas);

        $query = "SELECT NISN FROM status_absensi_siswa WHERE 
                  kehadiran = '$kehadiran' AND id_absensi = '$id_absen' 
                  AND tanggal = CURDATE()";
        $result = ExecuteQuery($query);

        $jumlah_kehadiran = mysqli_num_rows($result);
        return $jumlah_kehadiran; 
    }