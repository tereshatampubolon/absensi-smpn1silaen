<?php
//koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$dbnm = "smpn_1_silaen";
 

$conn = mysqli_connect($host, $user, $pass,$dbnm);
$tanggal = $_GET['tanggal'];
$id = $_GET['id'];
 
#ambil data di tabel dan masukkan ke array
$query = "SELECT absensi.id_absensi,tanggal,kode_guru,id_jadwal,siswa.kelas,kehadiran,siswa.NISN,Nama 
		  FROM absensi INNER JOIN (status_absensi_siswa INNER JOIN siswa 
		  ON siswa.NISN = status_absensi_siswa.NISN)
		  ON absensi.id_absensi = status_absensi_siswa.id_absensi
		  WHERE absensi.id_absensi = '$id' AND tanggal = '$tanggal'";
$sql = mysqli_query($conn,$query);
$data = [];
while ($row = mysqli_fetch_assoc($sql)) {
	$data[] = $row ;
}
 
$query2 = "SELECT absensi.id_absensi,tanggal,kode_guru,id_jadwal,kelas FROM status_absensi_siswa  INNER JOIN absensi  
		   ON absensi.id_absensi = status_absensi_siswa.id_absensi
		   WHERE absensi.id_absensi = '$id' AND tanggal = '$tanggal'";

$result = mysqli_query($conn,$query2);
$info_absen = mysqli_fetch_assoc($result);
#setting judul laporan dan header tabel
$judul = "LAPORAN DATA ABSENSI SISWA KELAS ".$info_absen['kelas'];
$header = array(
		array("label"=>"No", "length"=>10, "align"=>"C"),
        array("label"=>"NISN", "length"=>50, "align"=>"C"),
        array("label"=>"Nama", "length"=>80, "align"=>"L"),
		array("label"=>"Status Kehadiran", "length"=>50, "align"=>"L"),
	);
 
#sertakan library FPDF dan bentuk objek
require_once ("FPDF_assets/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();
 
#tampilkan judul laporan
$pdf->SetFont('Arial','B','16');
$pdf->Cell(0,20, $judul, '0', 1, 'C');
// $info = mysqli_fetch_assoc($sql);
$pdf->SetFont('Arial','B','12');
$pdf->Cell(0,8, "ID Absensi : ".$info_absen['id_absensi'], '0', 1, 'L');
$pdf->Cell(0,8, "ID Jadwal : ".$info_absen['id_jadwal'], '0', 0, 'L');
$pdf->Cell(0,8, "Kode Guru : ".$info_absen['kode_guru'], '0', 1, 'R');
$pdf->Cell(0,8, "Kelas : ".$info_absen['kelas'], '0', 0, 'L');
$pdf->Cell(0,8, "Tanggal : ".$info_absen['tanggal'], '0', 1, 'R');
 
#buat header tabel
$pdf->SetFont('Arial','','10');
$pdf->SetFillColor(255,0,0);    //warna background
$pdf->SetTextColor(255); //warna text
$pdf->SetDrawColor(128,0,0); //warna border
foreach ($header as $kolom) {
	$pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln(); //line baru
 
#tampilkan data tabelnya
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$fill=false;
$i = 0;
foreach ($data as $baris) {
	$i += 1;
	// echo $i."<br>";
        $pdf->Cell(10, 5, $i, 0, '0', 'C' , $fill);
        $pdf->Cell(50, 5, $baris['NISN'], 0, '0', 'C', $fill);
        $pdf->Cell(80, 5, $baris['Nama'], 0, '0', $kolom['align'], $fill);
        $pdf->Cell(50, 5, $baris['kehadiran'], 0, '0', $kolom['align'], $fill);
		
	// ++$i;
	$fill = !$fill;
	$pdf->Ln();
}


#output file PDF
$pdf->Output();
?>