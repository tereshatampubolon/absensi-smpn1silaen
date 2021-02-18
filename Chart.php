<?php 
    require_once 'commons/Function.php';
    $data = array();
    $jlh_siswa = GetJumlahSiswa($_GET['kelas']);
    // echo $kode_acara;
    $jlh_hadir = CountKehadiran_byGuru('hadir',$_SESSION['kode_guru'],$_GET['kelas']);
    $jlh_izin = CountKehadiran_byGuru('izin',$_SESSION['kode_guru'],$_GET['kelas']);
    $jlh_sakit = CountKehadiran_byGuru('sakit',$_SESSION['kode_guru'],$_GET['kelas']);
    $jlh_alpha = CountKehadiran_byGuru('alpha',$_SESSION['kode_guru'],$_GET['kelas']); 
    
    $degree_izin = (($jlh_izin)/$jlh_siswa)*360;
    $percent_izin = round((($jlh_izin)/$jlh_siswa)*100,2);

    $degree_sakit = (($jlh_sakit)/$jlh_siswa)*360;
    $percent_sakit = round((($jlh_sakit)/$jlh_siswa)*100,2);

    $degree_alpha = (($jlh_alpha)/$jlh_siswa)*360;
    $percent_alpha = round((($jlh_alpha)/$jlh_siswa)*100,2);

    $degree_hadir = 360;
    $percent_hadir = round((($jlh_siswa - ($jlh_alpha+$jlh_izin+$jlh_sakit))/$jlh_siswa)*100,2);

    $myImage = ImageCreate(200,200);
    $white = ImageColorAllocate($myImage, 247, 250, 255);
    $color_alpha = ImageColorAllocate($myImage, 255, 42, 42);
    $color_hadir = ImageColorAllocate($myImage, 0, 168, 255);
    $color_izin = ImageColorAllocate($myImage, 0, 255, 85);
    $color_sakit = ImageColorAllocate($myImage, 255, 231, 71);
   
    if($degree_alpha == 0 && $degree_izin == 0 && $degree_sakit == 0 ){
        ImageFilledArc($myImage, 100,100,120,120,0,$degree_hadir, $color_hadir, IMG_ARC_PIE);
    }  

    else if($degree_alpha == 0 && $degree_izin == 0){
        ImageFilledArc($myImage, 100,100,120,120,0,$degree_hadir, $color_hadir, IMG_ARC_PIE);
        ImageFilledArc($myImage, 100,100,120,120,0,$degree_sakit+$degree_izin+$degree_hadir, $color_sakit, IMG_ARC_PIE);
    }
    else if($degree_alpha == 0 && $degree_sakit == 0){
        ImageFilledArc($myImage, 100,100,120,120,0,$degree_hadir, $color_hadir, IMG_ARC_PIE);
        ImageFilledArc($myImage, 100,100,120,120,0,$degree_izin+$degree_hadir, $color_izin, IMG_ARC_PIE);
    } 
    else if($degree_sakit == 0 && $degree_izin == 0){
        ImageFilledArc($myImage, 100,100,120,120,0,$degree_hadir, $color_hadir, IMG_ARC_PIE);
        ImageFilledArc($myImage, 100,100,120,120,0,$degree_alpha+$degree_sakit+$degree_izin+$degree_hadir, $color_alpha, IMG_ARC_PIE);
    }

    else if($degree_alpha == 0){
        ImageFilledArc($myImage, 100,100,120,120,0,$degree_hadir, $color_hadir, IMG_ARC_PIE);
        ImageFilledArc($myImage, 100,100,120,120,0,$degree_sakit+$degree_izin+$degree_hadir, $color_sakit, IMG_ARC_PIE);
        ImageFilledArc($myImage, 100,100,120,120,0,$degree_izin+$degree_hadir, $color_izin, IMG_ARC_PIE);
    }
    else if($degree_sakit == 0){
        ImageFilledArc($myImage, 100,100,120,120,0,$degree_hadir, $color_hadir, IMG_ARC_PIE);
        ImageFilledArc($myImage, 100,100,120,120,0,$degree_alpha+$degree_sakit+$degree_izin+$degree_hadir, $color_alpha, IMG_ARC_PIE);
        ImageFilledArc($myImage, 100,100,120,120,0,$degree_izin+$degree_hadir, $color_izin, IMG_ARC_PIE);
    }
    else if($degree_izin == 0){
        ImageFilledArc($myImage, 100,100,120,120,0,$degree_hadir, $color_hadir, IMG_ARC_PIE);
        ImageFilledArc($myImage, 100,100,120,120,0,$degree_alpha+$degree_sakit+$degree_izin+$degree_hadir, $color_alpha, IMG_ARC_PIE);        
        ImageFilledArc($myImage, 100,100,120,120,0,$degree_sakit+$degree_izin+$degree_hadir, $color_sakit, IMG_ARC_PIE);
    }

    else{
        ImageFilledArc($myImage, 100,100,120,120,0,$degree_hadir, $color_hadir, IMG_ARC_PIE);
        ImageFilledArc($myImage, 100,100,120,120,0,$degree_alpha+$degree_sakit+$degree_izin+$degree_hadir, $color_alpha, IMG_ARC_PIE);
        ImageFilledArc($myImage, 100,100,120,120,0,$degree_sakit+$degree_izin+$degree_hadir, $color_sakit, IMG_ARC_PIE);
        ImageFilledArc($myImage, 100,100,120,120,0,$degree_izin+$degree_hadir, $color_izin, IMG_ARC_PIE);
    }

    ImagePng($myImage, "css/images/Chart.png");
    ImageDestroy($myImage);

    $hadir = ImageCreate(20,20);
    $keterangan_hadir = ImageColorAllocate($hadir, 0, 168, 255); 
    ImagePng($hadir, "css/images/hadir.png");
    ImageDestroy($hadir);

    $izin = ImageCreate(20,20);
    $keterangan_izin = ImageColorAllocate($izin, 0, 255, 85); 
    ImagePng($izin, "css/images/izin.png");
    ImageDestroy($izin);

    $sakit = ImageCreate(20,20);
    $keterangan_sakit = ImageColorAllocate($sakit, 255, 231, 71); 
    ImagePng($sakit, "css/images/sakit.png");
    ImageDestroy($sakit);

    $alpha = ImageCreate(20,20);
    $keterangan_alpha = ImageColorAllocate($alpha, 255, 42, 42); 
    ImagePng($alpha, "css/images/alpha.png");
    ImageDestroy($alpha);
 ?>
 <table>
    <tr>
        <td><img src='css/images/Chart.png'></td>
        <td><img src='css/images/hadir.png'>&nbsp hadir = <?= $jlh_hadir; ?>&nbsp(<?= $percent_hadir ?>%)</td>
        <td><img src='css/images/sakit.png'>&nbsp sakit = <?= $jlh_sakit; ?>&nbsp(<?= $percent_sakit ?>%)</td>
        <td><img src='css/images/izin.png'>&nbsp izin = <?= $jlh_izin; ?>&nbsp(<?= $percent_izin ?>%)</td>
        <td><img src='css/images/alpha.png'>&nbsp alpha = <?= $jlh_alpha; ?>&nbsp(<?= $percent_alpha ?>%)</td>
    </tr>
 </table>