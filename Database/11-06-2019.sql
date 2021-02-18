UPDATE status_absensi_siswa SET kehadiran = 'sakit',id_absensi = '101',NISN = '999993',tanggal = CURDATE() WHERE NISN = '999993';

SELECT absensi.id_absensi,tanggal,kode_guru,id_jadwal,siswa.kelas,kehadiran,siswa.NISN,Nama 
	FROM absensi INNER JOIN (status_absensi_siswa INNER JOIN siswa 
	ON siswa.NISN = status_absensi_siswa.NISN)
	ON absensi.id_absensi = status_absensi_siswa.id_absensi
	WHERE absensi.id_absensi = '101' AND tanggal = '2019-06-11';
	
SELECT absensi.id_absensi,tanggal,kode_guru,id_jadwal,kelas FROM status_absensi_siswa  INNER JOIN absensi  
	ON absensi.id_absensi = status_absensi_siswa.id_absensi
	GROUP BY absensi.id_absensi,tanggal;
	
	SELECT absensi.id_absensi,tanggal,kode_guru,id_jadwal,kelas FROM status_absensi_siswa  INNER JOIN absensi  
	ON absensi.id_absensi = status_absensi_siswa.id_absensi
	WHERE absensi.id_absensi = '100' AND tanggal = '2019-06-10';
	
INSERT INTO kelas VALUES('7F',"Gujitak",12,'jojo');